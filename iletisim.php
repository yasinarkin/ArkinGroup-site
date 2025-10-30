<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1 class="text-center mb-5">Bize Ulaşın</h1>

<div class="row">
    
    <div class="col-md-6">
        <h3 class="mb-3">Mesaj Gönderin</h3>
        
        <form>
            <div class="mb-3">
                <label for="contact_name" class="form-label">Adınız Soyadınız</label>
                <input type="text" class="form-control" id="contact_name" required>
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">E-posta Adresiniz</label>
                <input type="email" class="form-control" id="contact_email" required>
            </div>
             <div class="mb-3">
                <label for="contact_subject" class="form-label">Konu</label>
                <input type="text" class="form-control" id="contact_subject" required>
            </div>
            <div class="mb-3">
                <label for="contact_message" class="form-label">Mesajınız</label>
                <textarea class="form-control" id="contact_message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mesajı Gönder</button>
        </form>
    </div>
</body>
</html>