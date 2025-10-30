<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="mb-4">Alışveriş Sepetim</h1>

<div class="row">
    
    <div class="col-md-8">
        
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col" colspan="2">Ürün</th>
                    <th scope="col" class="text-center">Miktar</th>
                    <th scope="col" class="text-end">Birim Fiyat</th>
                    <th scope="col" class="text-end">Toplam</th>
                    <th scope="col" class="text-center">Sil</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td style="width: 100px;">
                        <img src="https://via.placeholder.com/100x70?text=Sandviç+Panel" class="img-fluid rounded" alt="Ürün 1">
                    </td>
                    <td>
                        <strong>Sandviç Panel (Poliüretan)</strong>
                        <small class="d-block text-muted">Yüksek ısı yalıtımı</small>
                    </td>
                    <td class="text-center" style="width: 120px;">
                        <input type="number" class="form-control text-center" value="2" min="1">
                    </td>
                    <td class="text-end">240.00 TL</td>
                    <td class="text-end"><strong>480.00 TL</strong></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btn-sm">&times;</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="https://via.placeholder.com/100x70?text=Shingle" class="img-fluid rounded" alt="Ürün 2">
                    </td>
                    <td>
                        <strong>Shingle (Şıngıl) Kaplama</strong>
                        <small class="d-block text-muted">Dekoratif kaplama</small>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control text-center" value="10" min="1">
                    </td>
                    <td class="text-end">80.00 TL</td>
                    <td class="text-end"><strong>800.00 TL</strong></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btn-sm">&times;</a>
                    </td>
                </tr>
                
            </tbody>
        </table>

        <a href="index.php?page=urunler" class="btn btn-outline-primary">&larr; Alışverişe Devam Et</a>

    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Sipariş Özeti</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ara Toplam
                        <span>1280.00 TL</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        KDV (%20)
                        <span>256.00 TL</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Kargo
                        <span>Ücretsiz</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                        <strong>Genel Toplam</strong>
                        <strong>1536.00 TL</strong>
                    </li>
                </ul>
                
                <div class="d-grid mt-4">
                    <a href="#" class="btn btn-success btn-lg">Ödemeye Geç</a>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>