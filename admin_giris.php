<?php
session_start();
include("db.php"); 

if (isset($_POST['giris_yap'])) {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];
    $sql = "SELECT * FROM users_tb WHERE kullanici_adi = '$kullanici_adi' AND sifre = '$sifre' AND yetki = 1";
    $sonuc = $conn->query($sql);
    if ($sonuc->num_rows > 0) {
        $kullanici = $sonuc->fetch_assoc();
        
        $_SESSION['admin_oturum'] = true;
        $_SESSION['kullanici_adi'] = $kullanici['kullanici_adi'];
        $_SESSION['ad_soyad'] = $kullanici['ad'] . " " . $kullanici['soyad'];
        header("Location: admin.php");
        exit;
    } else {
        $hata = "Kullanıcı adı yanlış, şifre hatalı veya yetkiniz yok!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi - Arkin Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify_content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="login-card">
            <div class="brand-logo">
                <h3>ARKIN GROUP</h3>
                <p class="text-muted">Yönetim Paneli Girişi</p>
            </div>

            <?php if(isset($hata)): ?>
                <div class="alert alert-danger text-center p-2" role="alert">
                    <?php echo $hata; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="kullanici_adi" required autofocus placeholder="Admin kullanıcı adınız">
                </div>

                <div class="mb-3">
                    <label for="sifre" class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="sifre" required placeholder="********">
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" name="giris_yap" class="btn btn-dark btn-lg">Oturum Aç</button>
                </div>
                
                <div class="text-center mt-3">
                    <a href="index.php" class="text-decoration-none text-secondary small">← Siteye Dön</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>