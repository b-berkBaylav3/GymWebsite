<?php
// Veritabanına bağlan
include('baglanti.php'); // Veritabanı bağlantı dosyanızın adı

// Personel verilerini çek
$sorgu_hakkimizda = mysqli_query($baglanti, "SELECT slogan , hakkinda, neden_biz FROM genel_bilgiler");
$genel_bilgiler = mysqli_fetch_assoc($sorgu_hakkimizda);
$hakkimizda = $genel_bilgiler['hakkinda'];
$slogan = $genel_bilgiler['slogan'];
$neden_biz = $genel_bilgiler['neden_biz'];

?>
 <!-- About Start -->
 <div class="container-fluid p-5">
     <div class="row gx-5">
         <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
             <div class="position-relative h-100">
                 <img class="position-absolute w-100 h-100 rounded" src="img/about_rise.jpg" style="object-fit: cover;">
             </div>
         </div>
         <div class="col-lg-7">
             <div class="mb-4">
                 <h5 class="text-primary text-uppercase">Hakkımızda</h5>
                 <h1 class="display-3 text-uppercase mb-0">Rise Gym'e Hoşgeldin</h1>
             </div>
             
             <p class="mb-4"><?php echo $slogan;   ?></p>
             <div class="rounded bg-dark p-5">
                 <ul class="nav nav-pills justify-content-between mb-3">
                     <li class="nav-item w-50">
                         <a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#pills-1">Hakkımızda</a>
                     </li>
                     <li class="nav-item w-50">
                             <a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#pills-2">Neden Biz</a>
                     </li>
                 </ul>
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="pills-1">
                         <p class="text-secondary mb-0"><?php echo $hakkimizda;  ?></p>
                     </div>
                     <div class="tab-pane fade" id="pills-2">
                         <p class="text-secondary mb-0"><?php echo $neden_biz;  ?></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- About End -->


