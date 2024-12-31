<?php
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    echo "<p style='color: green;'>Form başarıyla gönderildi!</p>";
}
?>


<?php
// Veritabanına bağlan
include('baglanti.php'); // Veritabanı bağlantı dosyanızın adı

// Personel verilerini çek
$sorgu_hakkimizda = mysqli_query($baglanti, "SELECT slogan , hakkinda, neden_biz FROM genel_bilgiler");
$genel_bilgiler = mysqli_fetch_assoc($sorgu_hakkimizda);
$slogan = $genel_bilgiler['slogan'];


?>



<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/rise_gym.jpg" alt="Image">
                <div class="carousel-caption d-flex justify-content-center align-items-center" style="position: absolute; bottom: 20px; left: 0; right: 0;">
                    <div class="row w-100">
                        <!-- Sol taraf yazılar -->
                        <div class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0" style="padding-left: 200px; padding-bottom: 50px;"> <!-- padding-bottom eklendi -->
                            <h1 class="text-white">RİSE GYM İLE YÜKSEL</h1>
                            <p class="text-white"><?php echo $slogan;  ?></p>
                        </div>

                        <!-- Sağ taraf form -->
                        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <div class="w-75 mx-auto" style="padding-bottom: 50px;"> <!-- padding-bottom eklendi -->
                                <h1 class="text-light text-center mb-4">Bilgi Al</h1> <!-- Başlık burada ortalanmış ve aşağıya kaydırılmış -->
                                <form action="form_gonder.php" method="POST">
  <div class="row g-3">
        <div class="col-12 col-md-6">
            <input type="text" class="form-control bg-light border-0 px-4" name="name" placeholder="Your Name" style="height: 55px;" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="email" class="form-control bg-light border-0 px-4" name="email" placeholder="Your Email" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <input type="text" class="form-control bg-light border-0 px-4" name="subject" placeholder="Subject" style="height: 55px;" required>
        </div>
        <div class="col-12">
            <textarea class="form-control bg-light border-0 px-4 py-3" name="message" rows="4" placeholder="Message" required></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

