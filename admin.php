<?php
session_start();
include("db.php");

//GİRİŞ KONTROL
if(!isset($_SESSION['admin_oturum'])) {
    header("Location: admin_giris.php");
    exit;
}


//SİLME

 if(isset($_GET['sil_id'])) {
    $sil_id = $_GET['sil_id'];
    $conn->query("DELETE FROM users_tb WHERE user_ID = $sil_id");
    header("Location: admin.php"); // Temiz URL için yönlendir
    exit;
}


//KAYDI GÜNCELLEME

if(isset($_POST['guncelle'])) {
    $id = $_POST['user_ID'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kadi = $_POST['kullanici_adi'];
    $eposta = $_POST['eposta'];
    $yetki = $_POST['yetki'];
    $yeni_sifre = $_POST['sifre'];

    
    if(empty($yeni_sifre)) {
        $sql = "UPDATE users_tb SET ad='$ad', soyad='$soyad', kullanici_adi='$kadi', eposta='$eposta', yetki='$yetki' WHERE user_ID=$id";
    } else {
        $sql = "UPDATE users_tb SET ad='$ad', soyad='$soyad', kullanici_adi='$kadi', eposta='$eposta', sifre='$yeni_sifre', yetki='$yetki' WHERE user_ID=$id";
    }

    if($conn->query($sql)) {
        header("Location: admin.php");
        exit;
    } else {
        $hata_mesaji = "Güncelleme hatası: " . $conn->error;
    }
}


// DÜZENLEME

$duzenleme_modu = false;
$kullanici_verisi = [];

if(isset($_GET['edit_id'])) {
    $duzenleme_modu = true;
    $edit_id = $_GET['edit_id'];
    $sonuc = $conn->query("SELECT * FROM users_tb WHERE user_ID = $edit_id");
    $kullanici_verisi = $sonuc->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkin Group - Admin Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class="fas fa-user-shield"></i> Yönetim Paneli</h3>
        <div>
            <span class="me-3"> <strong><?php echo $_SESSION['ad_soyad']; ?></strong></span>
            <a href="index.php" class="btn btn-outline-dark btn-sm">Çıkış / Siteye Dön</a>
        </div>
    </div>

    <?php if(isset($hata_mesaji)): ?>
        <div class="alert alert-danger"><?php echo $hata_mesaji; ?></div>
    <?php endif; ?>

    <?php if($duzenleme_modu): ?>
        
        <div class="card shadow border-warning">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Kullanıcı Düzenle: <?php echo $kullanici_verisi['ad'] . " " . $kullanici_verisi['soyad']; ?></h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="user_ID" value="<?php echo $kullanici_verisi['user_ID']; ?>">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Ad</label>
                            <input type="text" class="form-control" name="ad" value="<?php echo $kullanici_verisi['ad']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Soyad</label>
                            <input type="text" class="form-control" name="soyad" value="<?php echo $kullanici_verisi['soyad']; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="kullanici_adi" value="<?php echo $kullanici_verisi['kullanici_adi']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-Posta</label>
                            <input type="email" class="form-control" name="eposta" value="<?php echo $kullanici_verisi['eposta']; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Şifre <span class="text-muted small">(Değişmeyecekse boş bırakın)</span></label>
                            <input type="text" class="form-control" name="sifre" placeholder="Yeni şifre...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Yetki</label>
                            <select class="form-select" name="yetki">
                                <option value="0" <?php if($kullanici_verisi['yetki'] == 0) echo 'selected'; ?>>Standart Kullanıcı</option>
                                <option value="1" <?php if($kullanici_verisi['yetki'] == 1) echo 'selected'; ?>>Yönetici (Admin)</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="admin.php" class="btn btn-secondary">İptal</a>
                        <button type="submit" name="guncelle" class="btn btn-success">Değişiklikleri Kaydet</button>
                    </div>
                </form>
            </div>
        </div>

    <?php else: ?>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Kullanıcı Listesi</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-secondary">
                            <tr>
                                <th>#ID</th>
                                <th>Ad Soyad</th>
                                <th>Kullanıcı Adı</th>
                                <th>E-Posta</th>
                                <th>Şifre</th>
                                <th>Yetki</th>
                                <th class="text-center" style="width: 140px;">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users_tb";
                            $sonuc = $conn->query($sql);

                            if ($sonuc->num_rows > 0) {
                                while($row = $sonuc->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['user_ID']; ?></td>
                                        <td><?php echo $row['ad'] . " " . $row['soyad']; ?></td>
                                        <td><strong><?php echo $row['kullanici_adi']; ?></strong></td>
                                        <td><?php echo $row['eposta']; ?></td>
                                        <td><span class="text-muted">****</span></td>
                                        <td>
                                            <?php 
                                            if($row['yetki'] == 1) {
                                                echo '<span class="badge bg-danger">Yönetici</span>';
                                            } else {
                                                echo '<span class="badge bg-secondary">Kullanıcı</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="admin.php?edit_id=<?php echo $row['user_ID']; ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <a href="admin.php?sil_id=<?php echo $row['user_ID']; ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Bu kullanıcıyı silmek istediğine emin misin?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center p-3'>Kayıtlı kullanıcı yok.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php endif; ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>