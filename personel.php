<?php
// Veritabanına bağlan
include('baglanti.php'); // Veritabanı bağlantı dosyanızın adı

// Personel verilerini çek
$sorgu_personel = mysqli_query($baglanti, "SELECT id, adi, soyadi, resim, brans FROM personel ORDER BY adi ASC");
?>

<!-- Team Start -->
<div class="container-fluid p-5">
    <div class="mb-5 text-center">
        <h5 class="text-primary">Ekip</h5>
        <h1 class="display-3  mb-0">Tecrübeli Antrenörler</h1>
    </div>
    <div class="row g-5">
        <?php while ($satir_personel = mysqli_fetch_array($sorgu_personel)) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100" src="resimler/<?php echo $satir_personel['resim']; ?>" 
                             alt="<?php echo $satir_personel['adi'] . ' ' . $satir_personel['soyadi']; ?>">
                       
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" 
                         style="background: rgba(34, 36, 41, .9);">
                        <h5 class=" text-light">
                            <?php echo $satir_personel['adi'] . ' ' . $satir_personel['soyadi']; ?>
                        </h5>
                        <p class=" text-secondary m-0">
                            <?php echo $satir_personel['brans']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Team End -->
