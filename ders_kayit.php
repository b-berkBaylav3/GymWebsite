<?php
include('baglanti.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adSoyad = mysqli_real_escape_string($baglanti, $_POST['adSoyad']);
    $telefon = mysqli_real_escape_string($baglanti, $_POST['telefon']);
    $eposta = mysqli_real_escape_string($baglanti, $_POST['eposta']);
    $dersAdi = mysqli_real_escape_string($baglanti, $_POST['dersAdi']);

    // Kontenjan kontrolü
    $kontenjanSorgu = mysqli_query($baglanti, "SELECT mevcut_kontenjan, max_kontenjan FROM grup_dersleri WHERE ders_adi = '$dersAdi'");
    if ($kontenjanSorgu && mysqli_num_rows($kontenjanSorgu) > 0) {
        $kontenjanData = mysqli_fetch_assoc($kontenjanSorgu);
        $mevcutKontenjan = $kontenjanData['mevcut_kontenjan'];
        $maxKontenjan = $kontenjanData['max_kontenjan'];

        if ($mevcutKontenjan < $maxKontenjan) {
            // Kayıt ekleme
            $sql = "INSERT INTO ders_kayitlari (ad_soyad, telefon, eposta, ders_adi) VALUES ('$adSoyad', '$telefon', '$eposta', '$dersAdi')";
            if (mysqli_query($baglanti, $sql)) {
                // Kontenjanı artır
                $yeniKontenjan = $mevcutKontenjan + 1;
                $guncelleKontenjan = mysqli_query($baglanti, "UPDATE grup_dersleri SET mevcut_kontenjan = $yeniKontenjan WHERE ders_adi = '$dersAdi'");
                if ($guncelleKontenjan) {
                    echo "Kaydınız başarıyla alındı.";
                } else {
                    echo "Kayıt başarılı ancak kontenjan güncellenemedi.";
                }
            } else {
                echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($baglanti);
            }
        } else {
            echo "Kontenjan dolu. Bu ders için kayıt alınamıyor.";
        }
    } else {
        echo "Ders bilgisi bulunamadı.";
    }
} else {
    echo "Geçersiz istek.";
}
?>
