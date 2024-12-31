<?php
include('baglanti.php'); // Veritabanı bağlantısı

// URL parametresinden gelen ders adı
$sayfa_id = @$_GET['sayfa'];

// Veritabanından kuvvet dersinin detaylarını çekmek için sorgu
$sorgu_ders = mysqli_query($baglanti, "SELECT * FROM grup_dersleri WHERE ders_adi = 'Kuvvet'");

if ($sorgu_ders && mysqli_num_rows($sorgu_ders) > 0) {
    $satir_ders = mysqli_fetch_array($sorgu_ders);

    // Ders bilgilerini al
    $ders_adi = $satir_ders['ders_adi'];
    $ders_aciklama = $satir_ders['ders_aciklama']; // Uzun açıklama
    $ders_resim_id = $satir_ders['ders_resim_id'];
    $ders_gunu = $satir_ders['ders_gunu'];
    $ders_saati =$satir_ders['ders_saati'];
    $ders_egitmen = $satir_ders['ders_egitmen'];
    $ders_mevcut_kontenjan = $satir_ders['mevcut_kontenjan'];
    $ders_max_kontenjan = $satir_ders['max_kontenjan'];

    // Resim ID'si ile resmin adını sorgula
    $sorgu_resim = mysqli_query($baglanti, "SELECT resim_adi FROM resimler WHERE id = $ders_resim_id");
    $satir_resim = mysqli_fetch_array($sorgu_resim);
    $resim_ad = $satir_resim['resim_adi']; // Resim dosyasının adı
    $resim_yolu = "resimler/" . $resim_ad; // Resim yolu
} else {
    // Eğer ders bulunmazsa
    echo '<h1>Ders bulunamadı</h1>';
    exit;
}

?>


<div class="container p-5">
    <div class="text-center mb-5">
        <h1 class="display-3 mb-0"><?php echo $ders_adi; ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
            <img class="img-fluid w-100" src="<?php echo $resim_yolu; ?>" alt="<?php echo $ders_adi; ?>">
        </div>
        <div class="col-lg-6 col-md-12">
            <h4 class="mb-3">Ders Açıklaması:</h4>
            <p><?php echo $ders_aciklama; ?></p>
            <br>

           
            <div class="d-flex align-items-start justify-content-between">
    <div>
        <h6 style="display: inline;">Ders Saatleri: </h6>
        <p style="display: inline;"><?php echo $ders_gunu ?></p> /
        <p style="display: inline;"><?php echo $ders_saati ?></p>
        <br><br>
        <h6 style="display: inline;">Kontenjan: </h6>
        <p style="display: inline;"><?php echo $ders_max_kontenjan ?></p> /
        <p style="display: inline;"><?php echo $ders_mevcut_kontenjan ?></p>
        <br><br>
        <h6 style="display: inline;">Eğitmen: </h6>
        <p style="display: inline;"><?php echo $ders_egitmen; ?></p>
    </div>
    <a href="#" class="btn btn-primary px-4 py-2 ms-3" 
   style="align-self: flex-start; margin-top: 40px;" 
   data-bs-toggle="modal" data-bs-target="#registerModal">Derse Katıl</a>
</div>

            
        </div>
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel"><?php echo $ders_adi; ?> Kaydı</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm">
          <div class="mb-3">
            <label for="adSoyad" class="form-label">Ad Soyad</label>
            <input type="text" class="form-control" id="adSoyad" name="adSoyad" required>
          </div>
          <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" class="form-control" id="telefon" name="telefon" required>
          </div>
          <div class="mb-3">
            <label for="eposta" class="form-label">E-posta</label>
            <input type="email" class="form-control" id="eposta" name="eposta" required>
          </div>
          <input type="hidden" name="dersAdi" value="<?php echo $ders_adi; ?>">
          <button type="submit" class="btn btn-primary">Kaydol</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('ders_kayit.php', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.text())
    .then(data => {
      alert(data); // Mesajı kullanıcıya göster
      if (data.includes('başarıyla')) {
        document.getElementById('registerForm').reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
        modal.hide();
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
});

</script>
