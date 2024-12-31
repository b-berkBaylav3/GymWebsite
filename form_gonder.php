<?php
// Veritabanına bağlan
include('baglanti.php'); // Veritabanı bağlantınızı sağlayan dosya

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen verileri alın
    $name = mysqli_real_escape_string($baglanti, $_POST['name']);
    $email = mysqli_real_escape_string($baglanti, $_POST['email']);
    $subject = mysqli_real_escape_string($baglanti, $_POST['subject']);
    $message = mysqli_real_escape_string($baglanti, $_POST['message']);

    // Veritabanına ekle
    $query = "INSERT INTO iletisim_formu (ad, eposta, konu, mesaj) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($baglanti, $query)) {
        echo "Form başarıyla gönderildi!";
        // Başarılı işlem sonrası anasayfaya yönlendirme
        header("Location: index.php?status=success");
    } else {
        echo "Form gönderilirken hata oluştu: " . mysqli_error($baglanti);
    }
}
?>
