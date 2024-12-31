<?php


$host = "127.0.0.1";
$username = "121620191046";
$password = "8y4i8ZekpM8";
$database = "db_121620191046 ";

$baglanti = mysqli_connect($host,$username,$password,$database);

if ( mysqli_connect_errno() ) {
	echo "Bağlantı Başarısız. Hata : ".mysqli_connect_error();
	die();
}
else {
		
}




?>