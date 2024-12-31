<?php
// Veritabanına bağlan
include('baglanti.php'); // Veritabanı bağlantı dosyanızın adı

// Veritabanı sorgusu
$sorgu_paketler = mysqli_query($baglanti, "SELECT classic_paket_fiyat, gold_paket_fiyat, platinum_paket_fiyat, 
    classic_aciklamalar, gold_aciklamalar, platinum_aciklamalar 
    FROM genel_bilgiler");

$paketler = mysqli_fetch_assoc($sorgu_paketler);

// Paket fiyatlarını al
$classic_fiyat = $paketler['classic_paket_fiyat'];
$gold_fiyat = $paketler['gold_paket_fiyat'];
$platinum_fiyat = $paketler['platinum_paket_fiyat'];

// Paket açıklamalarını diziye dönüştür
$classic_aciklamalar = explode("\n", $paketler['classic_aciklamalar']);
$gold_aciklamalar = explode("\n", $paketler['gold_aciklamalar']);
$platinum_aciklamalar = explode("\n", $paketler['platinum_aciklamalar']);

// Başvuru işlemi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['paket'], $_POST['isim'], $_POST['email'], $_POST['telefon'])) {
    $isim = mysqli_real_escape_string($baglanti, $_POST['isim']);
    $email = mysqli_real_escape_string($baglanti, $_POST['email']);
    $telefon = mysqli_real_escape_string($baglanti, $_POST['telefon']);
    $paket = mysqli_real_escape_string($baglanti, $_POST['paket']);
    
    // Veritabanına başvuru kaydet
    $sorgu = "INSERT INTO basvurular (isim, email, telefon, paket) 
              VALUES ('$isim', '$email', '$telefon', '$paket')";
    
    if (mysqli_query($baglanti, $sorgu)) {
        echo "Başvurunuz başarıyla kaydedildi!";
    } else {
        echo "Başvuru kaydında bir hata oluştu: " . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üyelik Paketleri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        .custom-check::before {
            color: #FB5B21; /* Özel turuncu renk */
        }

        #form-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modal-content {
            background: white;
            margin: 10% auto;
            padding: 20px;
            width: 50%;
            border-radius: 8px;
            position: relative;
        }

        .close {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
        }

        .close:hover {
            color: #FB5B21;
        }
    </style>
</head>
<body>

<!-- Üyelik Paketleri Start -->
<div class="container-fluid p-5">
    <div class="mb-5 text-center">
        <h5 class="text-primary text-uppercase">RISE GYM</h5>
        <h1 class="display-3 text-uppercase mb-0">Üyelik Paketleri</h1>
    </div>
    <div class="row g-4">
       
        <!-- Classic Paket -->
        <div class="col-lg-4 col-md-6">
            <div class="bg-white package-card py-5 px-3 text-center shadow rounded">
                <h3 class="package-title">CLASSIC</h3>
                <a href="#" class="join-btn" id="classic-join-btn" data-paket="classic">Bize Katıl <i class="bi bi-arrow-right"></i></a>
                <ul class="list-unstyled package-list mt-3">
                    <?php foreach ($classic_aciklamalar as $aciklama): ?>
                        <li class="bi bi-check custom-check"><?php echo htmlspecialchars($aciklama); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#" class="btn btn-primary price-btn" id="classic-price-btn" data-paket="classic"><?php echo $classic_fiyat ?> ₺ \ aylık</a>
            </div>
        </div>
        
        <!-- Gold Paket -->
        <div class="col-lg-4 col-md-6">
            <div class="bg-white package-card py-5 px-3 text-center shadow rounded">
                <h3 class="package-title">GOLD</h3>
                <a href="#" class="join-btn" id="gold-join-btn" data-paket="gold">Bize Katıl <i class="bi bi-arrow-right"></i></a>
                <ul class="list-unstyled package-list mt-3">
                    <?php foreach ($gold_aciklamalar as $aciklama): ?>
                        <li class="bi bi-check custom-check"><?php echo htmlspecialchars($aciklama); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#" class="btn btn-primary price-btn" id="gold-price-btn" data-paket="gold"><?php echo $gold_fiyat ?> ₺ \ aylık</a>
            </div>
        </div>

        <!-- Platinum Paket -->
        <div class="col-lg-4 col-md-6">
            <div class="bg-white package-card py-5 px-3 text-center shadow rounded">
                <h3 class="package-title">PLATINUM</h3>
                <a href="#" class="join-btn" id="platinum-join-btn" data-paket="platinum">Bize Katıl <i class="bi bi-arrow-right"></i></a>
                <ul class="list-unstyled package-list mt-3">
                    <?php foreach ($platinum_aciklamalar as $aciklama): ?>
                        <li class="bi bi-check custom-check"><?php echo htmlspecialchars($aciklama); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#" class="btn btn-primary price-btn" id="platinum-price-btn" data-paket="platinum"><?php echo $platinum_fiyat ?> ₺ \ aylık</a>
            </div>
        </div>

    </div>
</div>
<!-- Üyelik Paketleri End -->

<!-- Başvuru Formu Modal -->
<div id="form-modal" class="modal">
    <div class="modal-content">
        <form method="POST">
            <h2>Başvuru Formu</h2>
            <input type="text" name="isim" placeholder="Adınız" required class="form-control mb-2">
            <input type="email" name="email" placeholder="Email Adresiniz" required class="form-control mb-2">
            <input type="tel" name="telefon" placeholder="Telefon Numaranız" required class="form-control mb-2">
            <input type="hidden" name="paket" id="paket">
            <button type="submit" class="btn btn-success">Başvur</button>
        </form>
        <span class="close">&times;</span>
    </div>
</div>

<!-- jQuery kütüphanesini dahil edin -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Paket seçim butonlarına tıklanabilirlik
        $(".join-btn, .price-btn").click(function(event) {
            event.preventDefault();
            var paket = $(this).data('paket');  // Tıklanan paket bilgisini al
            $("#paket").val(paket);  // Paket bilgisini formda sakla
            $("#form-modal").fadeIn();  // Modalı göster
        });

        // Modal kapanma işlemi
        $(".close").click(function() {
            $("#form-modal").fadeOut();
        });

        // Modal dışında bir yere tıklanırsa kapanacak
        $(document).click(function(event) {
            if ($(event.target).is("#form-modal")) {
                $("#form-modal").fadeOut();
            }
        });
    });
</script>

</body>
</html>

