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
        <h1 class="text-center mb-4">Hesap Oluşturun</h1>
        <p class="text-center mb-4">Hizmetlerimizden yararlanmak için formu doldurun.</p>

        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Adınız Soyadınız</label>
                <input type="text" class="form-control" id="name" placeholder="Adınız Soyadınız" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresi</label>
                <input type="email" class="form-control" id="email" placeholder="ornek@mail.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Şifrenizi Onaylayın</label>
                <input type="password" class="form-control" id="password_confirm" required>
                </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">Kayıt Ol</button>
            </div>
            
            <div class="text-center mt-4">
                <p>Zaten bir hesabınız var mı? <a href="index.php?page=giris">Giriş Yapın</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>