<!DOCTYPE html>



<?php
include('baglanti.php');
$sorgu_gnl = mysqli_query($baglanti,"Select * from genel_bilgiler");
$satir_gnl = mysqli_fetch_array($sorgu_gnl);
?>









<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $satir_gnl['site_adi'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="rise gym" name="keywords">
    <meta content="rise gym" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
  

    <?php 

    include('header.php'); 
    
    
    $sayfa_id = @$_GET['sayfa'];
	
	if ( isset($sayfa_id) == false ) {
		$sayfa_id = 'anasayfa';
	}
	
	if ( $sayfa_id == 'hakkinda'  ) {
		include('hakkinda.php');
	} elseif ( $sayfa_id == 'anasayfa' ) {
		include('anasayfa.php');
	} elseif ( $sayfa_id == 'iletisim' ) {
		include('iletisim.php');
	}elseif ( $sayfa_id == 'personel' ) {
		include('personel.php');
	}elseif ( $sayfa_id == 'paketler' ) {
		include('paketler.php');
	}
    elseif ( $sayfa_id == 'grup_dersleri' ) {
		include('grup_dersleri.php');
	} elseif ( $sayfa_id == 'Pilates' ) {
		include('pilates.php');
	}
    elseif ( $sayfa_id == 'Core' ) {
		include('core.php');
	}
    elseif ( $sayfa_id == 'Yoga' ) {
		include('yoga.php');
	}
    elseif ( $sayfa_id == 'Kuvvet' ) {
		include('kuvvet.php');
	}
    elseif ( $sayfa_id == 'rapor' ) {
		include('rapor.php');
	}
     else{
		include('anasayfa.php');
	}
    
    
    
    
    
    
    
    
    
    include('footer.php');
    
    ?>

   




    


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>