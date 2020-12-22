<?php 
require_once('config/koneksi.php'); //import konfig database agar tidak berulang menginisiasikan database
$db = pdo_connect_mysql(); //konek database yang sudah diimport
error_reporting(0); //mematikan error log
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asset/css.css">
</head>
<body>
<div class="top-menu"></div>
<div class="menu">
	<div class="menu">
		<ul>
			<li><a href="index.php?page=login">Login</a></li>
		</ul>
	</div>
</div>
<div class="container">
<div class="isi">
	<?php 
	if(isset($_GET['page'])){ //digunakan untuk tampilan halaman dinamis
		$page = $_GET['page']; //mengambil id page jika berganti halaman
		switch ($page) {
			case 'login': //ketika page ke login maka akan mengimport halaman login.php
				include 'login.php';
				break;
			case 'register':
				include 'register.php';
				break;
			default:
				# code...
				break;
		}
	}
	?>
</div>
</div>
<div class="footer"></div>
</body>
</html>