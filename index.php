<?php 
require_once('config/koneksi.php'); //import konfig database agar tidak berulang menginisiasikan database
$db = pdo_connect_mysql(); //konek database yang sudah diimport
error_reporting(0); //mematikan error log
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="asset/css.css">
</head>
<body>
<div class="container">
	<div class="kiri">
		<h2>NO<br>DAYS<br>OFF !!</h2> <br>
		<a href="index.php?page=login" class="btn">Login</a> |
		<a href="index.php?page=register" class="btn">Register</a>
	</div>
	<div class="menu">
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
		</ul>
	</div>
	<div class="kanan">
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