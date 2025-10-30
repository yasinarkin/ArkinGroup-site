<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center mb-4">Giriş Yap</h1>
        <p class="text-center mb-4">Lütfen e-posta adresinizi ve şifrenizi girin.</p>

        <form>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresi</label>
                <input type="email" class="form-control" id="email" placeholder="ornek@mail.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" required>
            </div>

            <div class="text-end mb-3">
                <a href="#">Şifremi unuttum</a>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Giriş Yap</button>
            </div>
            
            <div class="text-center mt-4">
                <p>Hesabınız yok mu? <a href="index.php?page=kayit">Hemen Kayıt Olun</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>