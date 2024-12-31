<?php
include('baglanti.php'); // Veritabanı bağlantı dosyanızın adı

$sorgu_dersler = mysqli_query($baglanti, "SELECT ders_adi, ders_kisa_aciklama, ders_resim_id FROM grup_dersleri");
?>
<!-- Grup Dersleri Start -->
<div class="container-fluid p-5">
    <div class="mb-5 text-center">
        <h1 class="display-3 mb-0">Grup Dersleri</h1>
    </div>
    <div class="row g-5">
        <?php while ($satir_dersler = mysqli_fetch_array($sorgu_dersler)) {
            // Dersin resim ID'sini al
            $ders_resim_id = $satir_dersler['ders_resim_id'];
            
            // Resim ID'si ile resmin adını sorgula
            $sorgu_resim = mysqli_query($baglanti, "SELECT resim_adi FROM resimler WHERE id = $ders_resim_id");
            $satir_resim = mysqli_fetch_array($sorgu_resim);
            $resim_ad = $satir_resim['resim_adi']; // Resim dosyasının adı

            // Resim yolunu oluştur
            $resim_yolu = "resimler/" . $resim_ad;
        ?>
            <div class="col-lg-6 col-md-12">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <!-- Resmi ekle -->
                        <img class="img-fluid w-100" src="<?php echo $resim_yolu; ?>" alt="<?php echo $satir_dersler['ders_adi']; ?>">
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" 
                         style="background: rgba(34, 36, 41, .9);">
                        <h5 class="text-light uppercase-text">
                            <?php echo $satir_dersler['ders_adi']; ?>
                        </h5>
                        <p class="text-secondary m-0">
                            <?php echo $satir_dersler['ders_kisa_aciklama']; ?>
                        </p>
                        
                        <!-- Dersi İncele butonu -->
                        <a href="index.php?sayfa=<?php echo(str_replace(' ', '_', $satir_dersler['ders_adi'])); ?>" class="btn btn-primary">Dersi İncele</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Grup Dersleri end -->
