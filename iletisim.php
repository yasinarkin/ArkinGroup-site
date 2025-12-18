<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <!-- Animasyon ve Özel Stiller -->
    <style> 
        @keyframes slideInFade {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #basariKutusu {
            animation: slideInFade 0.8s ease-out forwards;
            transition: opacity 1s ease, transform 1s ease;
        }

        .transparent-border-box {
            background-color: #272727;
            border: 1px solid rgba(255, 255, 255, 0.5); 
            padding: 2rem;
            border-radius: 10px; 
        }
    </style>
</head>
<body>

    <!--BİLDİRİM KISMI-->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div id="basariKutusu" class="alert alert-success text-center mb-4" role="alert" style="width: 50%; margin: 0 auto;">
            Talebiniz alınmıştır.
        </div>
        <script>
            setTimeout(function() {
                var kutu = document.getElementById('basariKutusu');
                if (kutu) {
                    kutu.style.opacity = '0';
                    kutu.style.transform = 'translateY(-20px)';
                    setTimeout(function() {
                        kutu.style.display = 'none';
                    }, 1000); 
                }
            }, 4000);
        </script>
    <?php endif; ?>

    <h1 class="text-center mb-5 text-white">Bize Ulaşın</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="transparent-border-box">
                <h3 class="mb-3 text-white">Mesaj Gönderin</h3>
                <form method="POST" action="index.php?page=iletisim">

                    <div class="mb-3">
                        <label for="contact_name" class="form-label text-white">Adınız Soyadınız</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact_email" class="form-label text-white">E-posta Adresiniz</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                    </div>
                    
                     <div class="mb-3">
                        <label for="contact_subject" class="form-label text-white">Konu</label>
                        <input type="text" class="form-control" id="contact_subject" name="contact_subject" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact_message" class="form-label text-white">Mesajınız</label>
                        <textarea class="form-control" id="contact_message" name="contact_message" rows="5" required></textarea>
                    </div>
            
                    <button type="submit" class="btn btn-outline-light w-100">Mesajı Gönder</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>