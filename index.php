<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Çatı Projesi E-Ticaret</title>
    
    <!-- css dosyaları -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <!-- navbar alanı -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Arkin Group</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=urunler">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=hakkimizda">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=iletisim">İletişim</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=giris">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=kayit">Kayıt Ol</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 
    
    <?php
        
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    
        
        $allowed_pages = [
            'urunler', 'hakkimizda', 'iletisim', 
            'giris', 'kayit', 'sepet', 'urun_detay'
        ];
        
        $file_to_include = $page . '.php';

        
        if ($page == 'home') {
            
    ?>
        
            
            <div class="hero-section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-8 mx-auto">
                            <h1 class="display-4 mb-4">Arkin Group</h1>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="container py-5">
                
                <div class="row align-items-center mb-5">
                    <div class="col-md-6">
                        <img src="img/altbir.png" class="img-fluid rounded shadow-sm" alt="Dayanıklı Çatı Çözümleri">
                    </div>
                    <div class="col-md-6 text-white">
                        <h3>Dayanıklı Çatı Çözümleri</h3>
                        <p class="lead">Projenizin mimarisine uygun, uzun ömürlü ve estetik malzemeler kullanıyoruz.</p>
                        <p>Buraya o bölümle ilgili daha detaylı bir açıklama metni ekleyebilirsiniz. Malzemenin kalitesinden veya kullanılan teknolojiden bahsedebilirsiniz.</p>
                        <a href="index.php?page=urunler" class="btn btn-outline-light">İlgili Ürünleri Gör</a>
                    </div>
                </div> 
                
                <hr class="my-5 border-light"> 
                
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-2">
                        <img src="img/alt2.png" class="img-fluid rounded shadow-sm" alt="Uzman Montaj Desteği">
                    </div>
                    <div class="col-md-6 order-md-1 text-white">
                        <h3>Uzman Montaj ve Destek</h3>
                        <p class="lead">Sadece malzeme satmıyor, aynı zamanda uzman ekibimizle montaj desteği de sağlıyoruz.</p>
                        <p>Buraya da ikinci önemli özelliğiniz veya hizmetiniz hakkında detaylı bilgi girebilirsiniz. Müşteri memnuniyeti, garanti süreci vb.</p>
                        <a href="index.php?page=hakkimizda" class="btn btn-outline-light">Ekibimizle Tanışın</a>
                    </div>
                </div> 
            </div> 

    <?php
        
        } elseif ( ($page == 'urunler' || $page == 'hakkimizda') && file_exists($file_to_include) ) {
            
    ?>
            <main class="container mt-4">
                <?php include $file_to_include; ?>
            </main>
    
    <?php
        
        } elseif (in_array($page, $allowed_pages) && file_exists($file_to_include)) {
            
    ?>
            <main class="container mt-4 p-4 bg-white rounded shadow-lg">
                <?php include $file_to_include; ?>
            </main>
    
    <?php
        
        } else {
            
    ?>
            <main class="container mt-4">
                <?php 
                if(file_exists('404.php')) {
                    include '404.php';
                } else {
                    echo '<h1>404 - Sayfa Bulunamadı</h1>';
                }
                ?>
            </main>
    <?php
        } 
    ?>
    


    
    <footer class="container mt-5 py-3 bg-white rounded-top shadow-lg">
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy; 2025 Çatı Şirketi. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

