-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ara 2024, 21:51:21
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `spor_salonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular`
--

CREATE TABLE `basvurular` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `basvurular`
--

INSERT INTO `basvurular` (`id`, `isim`, `email`, `telefon`, `paket`, `tarih`) VALUES
(1, 'baran berk', 'baranberkbaylav@gmail.com', '05441567835', 'gold', '2024-12-26 15:04:04'),
(2, 'baran berk', 'baranberkbaylav@gmail.com', '05441567835', 'gold', '2024-12-26 15:06:42'),
(3, 'özge hasoglu', 'ozge@gmail.com', '0544151896', 'platinum', '2024-12-26 15:07:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE `dersler` (
        `id` int(11) NOT NULL,
        `egitim_adi` varchar(101) NOT NULL,
        `aciklama` text NOT NULL,
        `egitmen_id` int(11) DEFAULT NULL,
        `saatler` varchar(55) NOT NULL,
        `gun` varchar(101) NOT NULL,
        `kapasite` smallint(6) NOT NULL,
        FOREIGN KEY (`egitmen_id`) REFERENCES `personel` (`id`)
    );

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_kayitlari`
--

CREATE TABLE `ders_kayitlari` (
        `id` int(11) NOT NULL,
        `ad_soyad` varchar(255) NOT NULL,
        `telefon` varchar(15) NOT NULL,
        `eposta` varchar(255) NOT NULL,
        `ders_adi` varchar(255) NOT NULL,
        `kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
        FOREIGN KEY (`ders_adi`) REFERENCES `dersler` (`egitim_adi`)
    );

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel_bilgiler`
--

CREATE TABLE `genel_bilgiler` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `hakkinda` text NOT NULL,
  `adres` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `kullanci_adi` varchar(55) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `www` varchar(55) NOT NULL,
  `neden_biz` text NOT NULL,
  `classic_paket_fiyat` int(11) NOT NULL,
  `gold_paket_fiyat` int(11) NOT NULL,
  `platinum_paket_fiyat` int(11) NOT NULL,
  `classic_aciklamalar` text NOT NULL,
  `gold_aciklamalar` text NOT NULL,
  `platinum_aciklamalar` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `genel_bilgiler`
--

INSERT INTO `genel_bilgiler` (`id`, `site_adi`, `slogan`, `hakkinda`, `adres`, `telefon`, `email`, `kullanci_adi`, `sifre`, `www`, `neden_biz`, `classic_paket_fiyat`, `gold_paket_fiyat`, `platinum_paket_fiyat`, `classic_aciklamalar`, `gold_aciklamalar`, `platinum_aciklamalar`) VALUES
(2, '', 'Rise Gym, sağlıklı bir yaşam tarzını benimsemek ve sporla hayata değer katmak isteyen herkes için bir ilham kaynağıdır. Modern ekipmanlarımız, alanında uzman eğitmenlerimiz ve sıcak bir ortam sunarak üyelerimizin hedeflerine ulaşmasını destekliyoruz.', 'Rise Gym, 2015 yılında Eskişehirde, spora olan tutkuyu yaşam tarzına dönüştürmek amacıyla kuruldu. Kurulduğumuz günden bu yana, modern ekipmanlarımız ve geniş antrenman alanlarımızla üyelerimize en iyi spor deneyimini sunuyoruz. Alanında uzman eğitmen kadromuzla her yaştan ve her seviyeden sporcuya rehberlik ederek, sağlıklı ve aktif bir yaşamı destekliyoruz.\r\n\r\n\r\nAmacımız, sadece bir spor salonu değil, bir topluluk oluşturarak sporun bir alışkanlık haline gelmesini sağlamak. Rise Gym\'de vücudunuzu güçlendirirken, zihninizi de dinç tutacağınız keyifli ve motive edici bir ortam sizi bekliyor.', 'Büyükdere Meşelik Yerleşkesi,Odunpazarı/Eskişehir', '05441567835', 'bilgi.risegym@gmail.com', '', '', '', 'Rise Gym olarak, yalnızca bir spor salonu değil, aynı zamanda bir yaşam tarzı sunuyoruz. Geniş ve modern ekipmanlarımız, profesyonel eğitmen kadromuz ve samimi ortamımızla her seviyeden sporcuya hitap ediyoruz. Sağlıklı bir yaşam hedefleyenler için kişisel antrenman programları, grup dersleri ve motivasyon dolu bir atmosfer sunuyoruz.\r\n\r\nSadece vücudunuzu değil, zihninizi de güçlendireceğiniz bir deneyim yaşamanız için buradayız. ', 1000, 1500, 2000, 'Üye Olunan Kulübü Sınırsız Kullanım\r\nGrup Derslerine 2 Gün Erken Rezervasyon\r\n30 Gün Ücretsiz Üyelik Dondurma Hakkı\r\nGrup Halinde Ölçüm ve Program', 'Üye Olunan Kulübü Sınırsız Kullanım\r\nGrup Derslerine 2 Gün Erken Rezervasyon\r\n30 Gün Ücretsiz Üyelik Dondurma Hakkı\r\nGrup Halinde Ölçüm ve Program', 'Üye Olunan Kulübü Sınırsız Kullanım\r\nGrup Derslerine 2 Gün Erken Rezervasyon\r\n30 Gün Ücretsiz Üyelik Dondurma Hakkı\r\nGrup Halinde Ölçüm ve Program');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `grup_dersleri`
--

CREATE TABLE `grup_dersleri` (
        `id` int(11) NOT NULL,
        `ders_adi` varchar(55) DEFAULT NULL,
        `ders_kisa_aciklama` tinytext NOT NULL,
        `ders_aciklama` text NOT NULL,
        `ders_resim_id` int(55) NOT NULL,
        `ders_gunu` varchar(55) NOT NULL,
        `ders_saati` varchar(55) NOT NULL,
        `ders_egitmen` varchar(55) NOT NULL,
        `mevcut_kontenjan` int(101) NOT NULL,
        `max_kontenjan` int(101) NOT NULL,
        FOREIGN KEY (`ders_egitmen`) REFERENCES `personel` (`id`)
    );

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_formu`
--

CREATE TABLE `iletisim_formu` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `konu` varchar(255) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iletisim_formu`
--

INSERT INTO `iletisim_formu` (`id`, `ad`, `eposta`, `konu`, `mesaj`, `tarih`) VALUES
(8, 'kıraç karadağ', 'baranberkbaylav@gmail.com', 'wefwefwef', 'wefwefwef', '2024-12-26 15:15:15'),
(9, 'kıraç karadağ', 'baranberkbaylav@gmail.com', 'wefwefwef', 'wefwefwef', '2024-12-26 15:18:03'),
(10, 'kıraç karadağ', 'baranberkbaylav@gmail.com', 'wefwefwef', 'wefwefwef', '2024-12-26 15:18:09'),
(11, 'kıraç karadağ', 'baranberkbaylav@gmail.com', 'wefwefwef', 'wefwefwef', '2024-12-26 15:22:26'),
(12, 'halil', 'halil@hotmail.com', 'baro', 'nednajendjae', '2024-12-26 15:22:49'),
(13, 'ozge', 'ozge@gmail.com', 'ko pkjo', 'hjgfcujgyfujyfg', '2024-12-27 13:01:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `id` int(11) NOT NULL,
  `adi` varchar(101) DEFAULT NULL,
  `soyadi` varchar(101) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `cinsiyet` varchar(1) DEFAULT NULL,
  `dogum_tarihi` date DEFAULT NULL,
  `ozgecmis` mediumtext DEFAULT NULL,
  `brans` varchar(70) DEFAULT NULL,
  `resim` varchar(69) DEFAULT NULL,
  `aktif_mi` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`id`, `adi`, `soyadi`, `email`, `telefon`, `cinsiyet`, `dogum_tarihi`, `ozgecmis`, `brans`, `resim`, `aktif_mi`) VALUES
(1, 'Eray ', 'Pektaş', 'eraypektaş@gmail.com', '05373421764', 'E', '2000-08-20', '8 yıldır profesyonel fitness eğitmenliği yapan Eren, kişisel antrenman programları oluşturma ve kilo yönetimi konusunda uzmanlaşmıştır. Uluslararası sertifikalara sahip olup, güçlenme, esneklik ve motivasyon odaklı çalışmalarıyla bireylerin hedeflerine ulaşmalarına yardımcı olur.', 'Fitness', 'eray_pektas.jpeg', 'E'),
(2, 'Burak', 'Kaya', 'burakkaya@gmail.com', '05442578963', 'E', '1991-12-28', 'Dayanıklılık ve kuvvet antrenmanlarında uzmanlaşmış olan Burak, sporcu performansı geliştirme ve rehabilitasyon süreçlerinde destek sağlama konusunda 5 yıllık deneyime sahiptir. Eğitmenliği sırasında motivasyonu artıran, kişiye özel yaklaşımlarıyla fark yaratır.', 'Body Building', 'burak_kaya.jpg', 'E'),
(3, 'Ayşe ', 'Demir', 'aysse_demir@gmail.com', '05369874152', 'K', '2001-11-17', 'Pilates, yoga ve fonksiyonel antrenman alanlarında uzmanlaşmış bir fitness eğitmeni olan Ayşe, 6 yıllık deneyimiyle beden-zihin dengesini destekleyen programlar sunmaktadır. Çeşitli yaş gruplarına uygun esneklik ve denge çalışmalarıyla tanınır.', 'Plates ve Yoga', 'ayse_demir1.jpg', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `resim_adi` varchar(55) DEFAULT NULL,
  `aciklama` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `resim_adi`, `aciklama`) VALUES
(1, 'pilates.jpg', 'grup_dersleri'),
(2, 'kuvvet.jpg', 'grup_dersleri'),
(3, 'yoga.jpg', 'grup_dersleri'),
(4, 'core.jpg', 'grup_dersleri'),
(5, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
        `id` int(11) NOT NULL,
        `ders_id` int(11) DEFAULT NULL,
        `kullanici_id` int(11) DEFAULT NULL,
        `tarih` date DEFAULT NULL,
        `saat` time DEFAULT NULL,
        FOREIGN KEY (`ders_id`) REFERENCES `dersler` (`id`),
        FOREIGN KEY (`kullanici_id`) REFERENCES `üyeler` (`id`)
    );

--
-- Tablo için indeksler `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `egitmen_id` (`egitmen_id`);

--
-- Tablo için indeksler `ders_kayitlari`
--
ALTER TABLE `ders_kayitlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `genel_bilgiler`
--
ALTER TABLE `genel_bilgiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `grup_dersleri`
--
ALTER TABLE `grup_dersleri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_resim` (`ders_resim_id`);

--
-- Tablo için indeksler `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ders_id` (`ders_id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Tablo için indeksler `üyeler`
--
ALTER TABLE `üyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basvurular`
--
ALTER TABLE `basvurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `ders_kayitlari`
--
ALTER TABLE `ders_kayitlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `genel_bilgiler`
--
ALTER TABLE `genel_bilgiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `grup_dersleri`
--
ALTER TABLE `grup_dersleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `dersler`
--
ALTER TABLE `dersler`
  ADD CONSTRAINT `egitmen_id` FOREIGN KEY (`egitmen_id`) REFERENCES `personel` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Tablo kısıtlamaları `grup_dersleri`
--
ALTER TABLE `grup_dersleri`
  ADD CONSTRAINT `ref_resim` FOREIGN KEY (`ders_resim_id`) REFERENCES `resimler` (`id`);

--
-- Tablo kısıtlamaları `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD CONSTRAINT `ders_id` FOREIGN KEY (`ders_id`) REFERENCES `dersler` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `kullanici_id` FOREIGN KEY (`kullanici_id`) REFERENCES `genel_bilgiler` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
