<?php
/*VERİTABANI BAĞLANTISI*/
try {
    $host = 'localhost';
    $dbname = 'arkingroup_db'; 
    $username = 'root';
    $password = ''; 

    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

/*KAYIT İŞLEMLERİ */
$mesaj = "";

if (isset($_POST['kayit_ol'])) {
    
    $ad = htmlspecialchars(trim($_POST['ad']));
    $soyad = htmlspecialchars(trim($_POST['soyad']));
    $kullanici_adi = htmlspecialchars(trim($_POST['kullanici_adi']));
    $eposta = htmlspecialchars(trim($_POST['email']));
    $sifre = $_POST['password'];
    $sifre_tekrar = $_POST['password_confirm'];
    
    $yetki = 0; 

    if ($sifre != $sifre_tekrar) {
        $mesaj = '<div class="alert alert-danger">Şifreler birbiriyle eşleşmiyor!</div>';
    } elseif (strlen($sifre) < 6) {
        $mesaj = '<div class="alert alert-warning">Şifreniz en az 6 karakter olmalıdır.</div>';
    } else {
        $sorgu = $db->prepare("SELECT * FROM users_tb WHERE eposta = ? OR kullanici_adi = ?");
        $sorgu->execute([$eposta, $kullanici_adi]);
        
        if ($sorgu->rowCount() > 0) {
            $mesaj = '<div class="alert alert-danger">Bu e-posta veya kullanıcı adı zaten sistemde kayıtlı.</div>';
        } else {
            
            $sifreli_sifre = password_hash($sifre, PASSWORD_DEFAULT);
            
            $ekle = $db->prepare("INSERT INTO users_tb (kullanici_adi, sifre, ad, soyad, eposta, yetki) VALUES (?, ?, ?, ?, ?, ?)");
            $sonuc = $ekle->execute([$kullanici_adi, $sifreli_sifre, $ad, $soyad, $eposta, $yetki]);

            if ($sonuc) {
                
                header("Location: index.php?page=giris");
                exit;
            } else {
                $mesaj = '<div class="alert alert-danger">Kayıt sırasında bir veritabanı hatası oluştu.</div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol - Arkin Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Hesap Oluşturun</h1>
            <p class="text-center mb-4">Hizmetlerimizden yararlanmak için formu doldurun.</p>
            
            <?php echo $mesaj; ?>

            <form action="" method="POST">
                
                <div class="row mb-3">
                    <div class="col">
                        <label for="ad" class="form-label">Adınız</label>
                        <input type="text" class="form-control" name="ad" placeholder="Adınız" required>
                    </div>
                    <div class="col">
                        <label for="soyad" class="form-label">Soyadınız</label>
                        <input type="text" class="form-control" name="soyad" placeholder="Soyadınız" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="kullanici_adi" placeholder="Kullanıcı adı belirleyin" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-posta Adresi</label>
                    <input type="email" class="form-control" name="email" placeholder="ornek@mail.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Şifrenizi Onaylayın</label>
                    <input type="password" class="form-control" name="password_confirm" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="kayit_ol" class="btn btn-success btn-lg">Kayıt Ol</button>
                </div>

                <div class="text-center mt-4">
                    <p>Zaten bir hesabınız var mı? <a href="index.php?page=giris">Giriş Yapın</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>