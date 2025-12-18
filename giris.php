<?php

if(!isset($conn)) { 
    include("db.php"); 
}
if(isset($_SESSION['kullanici_oturum'])) {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

if(isset($_POST['giris_yap'])) {
    $eposta = $_POST['eposta'];
    $sifre = $_POST['sifre'];

    $sql = "SELECT * FROM users_tb WHERE eposta = '$eposta' AND sifre = '$sifre'";
    
    $sonuc = $conn->query($sql);

    if($sonuc->num_rows > 0) {
        $kullanici = $sonuc->fetch_assoc();
        
        $_SESSION['kullanici_oturum'] = true;
        $_SESSION['user_ID'] = $kullanici['user_ID'];
        $_SESSION['ad_soyad'] = $kullanici['ad'] . " " . $kullanici['soyad'];
        $_SESSION['yetki'] = $kullanici['yetki']; 
        
    
        echo "<script>
            window.location.href='index.php';
        </script>";
        exit;
    
    } else {
        $hata_mesaji = "E-posta adresi veya şifre yanlış!";
    }
}
?>

<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-5">
                <h2 class="text-center mb-4 fw-bold">Giriş Yap</h2>
                <p class="text-center text-muted mb-4">Lütfen bilgilerinizi giriniz.</p>

                <?php if(isset($hata_mesaji)): ?>
                    <div class="alert alert-danger text-center"><?php echo $hata_mesaji; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">E-posta Adresi</label>
                        <input type="email" name="eposta" class="form-control" placeholder="ornek@mail.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Şifre</label>
                        <input type="password" name="sifre" class="form-control" placeholder="******" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" name="giris_yap" class="btn btn-dark btn-lg">Giriş Yap</button>
                    </div>
                </form>
                
                <div class="text-center mt-3">
                     <p>Hesabınız yok mu? <a href="index.php?page=kayit" class="text-decoration-none">Kayıt Ol</a></p>
                </div>
            </div>
        </div>
    </div>
</div>