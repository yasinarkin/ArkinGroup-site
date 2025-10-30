<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
    <div class="col-md-6">
        <img src="https://via.placeholder.com/600x400?text=Sandviç+Panel+Detay" class="img-fluid rounded" alt="Ürün Detay Görseli">
        </div>

    <div class="col-md-6">
        <h1>Sandviç Panel (Poliüretan)</h1>
        
        <p class="fs-3 text-danger">
            <strong>240.00 TL</strong> <span class="fs-5 text-muted">/ m²</span>
        </p>

        <p class="lead">
            Yüksek ısı yalıtımı sağlayan modern ve hızlı çatı kaplama çözümü.
            Stok durumu: <span class="text-success">Mevcut</span>
        </p>

        <form class="mt-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="quantity" class="form-label"><strong>Miktar (m²)</strong></label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1">
                </div>
                <div class="col-md-8 d-flex align-items-end">
                    <div class="d-grid w-100">
                        <button type="submit" class="btn btn-success btn-lg">Sepete Ekle</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h3 class="mb-3">Ürün Detayları</h3>
        
        <ul class="nav nav-tabs" id="productDetailsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Açıklama</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">Teknik Özellikler</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Yorumlar</button>
            </li>
        </ul>
        
        <div class="tab-content border border-top-0 p-3" id="productDetailsTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p>Sandviç paneller, iki metal yüzey arasına yüksek yoğunluklu poliüretan (PUR) veya poliizosiyanürat (PIR) köpük enjekte edilerek üretilen kompozit malzemelerdir.</p>
                <p><strong>Avantajları:</strong></p>
                <ul>
                    <li>Yüksek ısı ve ses yalıtımı</li>
                    <li>Hızlı montaj</li>
                    <li>Hafif ve dayanıklı yapı</li>
                    <li>Su ve hava sızdırmazlığı</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Panel Kalınlığı</td>
                            <td>40mm / 50mm / 60mm</td>
                        </tr>
                        <tr>
                            <td>Metal Kalınlığı</td>
                            <td>0.40mm - 0.70mm</td>
                        </tr>
                        <tr>
                            <td>Yoğunluk</td>
                            <td>40 kg/m³ (PIR)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <p>Bu ürün için henüz yorum yapılmamış. (30 Ekim'den sonra burası dinamik olacak)</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>