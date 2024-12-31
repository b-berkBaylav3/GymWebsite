<?php
// Veritabanı bağlantınızı burada yapıyorsunuz
include('baglanti.php');

// Form verilerini kontrol et ve işleme al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verileri al
    $ad = $_POST['ad'];
    $eposta = $_POST['eposta'];
    $konu = $_POST['konu'];
    $mesaj = $_POST['mesaj'];

    // Veritabanına ekleme işlemini yap
    $sorgu = "INSERT INTO iletisim_formu (ad, eposta, konu, mesaj) VALUES ('$ad', '$eposta', '$konu', '$mesaj')";
   

    if (mysqli_query($baglanti, $sorgu)) {
        // Başarıyla gönderildiyse, iletisim.php sayfasına yönlendir
        header("Location: iletisim.php?status=success");
        exit();
    } else {
        // Hata durumunda yönlendirme (isteğe bağlı)
        header("Location: iletisim.php?status=error");
        exit();
    }
}
?>

<?php

$sorgu_iletisim = mysqli_query($baglanti, "SELECT adres , telefon, email FROM genel_bilgiler");

$genel_bilgiler = mysqli_fetch_assoc($sorgu_iletisim);
$adres = $genel_bilgiler['adres'];
$telefon = $genel_bilgiler['telefon'];
$email = $genel_bilgiler['email'];


?>


  <!-- Contact Start -->
<div class="container-fluid p-5">
    <div class="mb-5 text-center">
        
        <h1 class="display-3 text-uppercase mb-0">İletişim</h1>
    </div>
    <div class="row g-5 mb-5">
        <div class="col-lg-4">
            <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-map-marker-alt fs-4 text-white"></i>
                </div>
                <h5 class="text-uppercase text-primary">Adres</h5>
                <p class="text-secondary mb-0"><?php echo $adres ?></p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-envelope fs-4 text-white"></i>
                </div>
                <h5 class="text-uppercase text-primary">Email</h5>
                <p class="text-secondary mb-0"><?php echo $email ?></p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-phone fs-4 text-white"></i>
                </div>
                <h5 class="text-uppercase text-primary">Telefon</h5>
                <p class="text-secondary mb-0"><?php echo $telefon ?></p>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-6">
            <div class="bg-dark p-5">
            <form action="iletisim.php" method="POST">
    <div class="row g-3">
        <div class="col-6">
            <input type="text" class="form-control bg-light border-0 px-4" placeholder="Your Name" name="ad" style="height: 55px;" required>
        </div>
        <div class="col-6">
            <input type="email" class="form-control bg-light border-0 px-4" placeholder="Your Email" name="eposta" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <input type="text" class="form-control bg-light border-0 px-4" placeholder="Subject" name="konu" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Message" name="mesaj" required></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
        </div>
    </div>
</form>

            </div>
        </div>
        <div class="col-lg-6">
            <iframe class="w-100"
                src="https://www.google.com/maps/d/embed?mid=1Ora1GqOjN4D9m0-im-SXcwScHTkHrIA&ehbc=2E312F&noprof=1"
                frameborder="0" style="height: 457px; border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</div>
<!-- Contact End -->
