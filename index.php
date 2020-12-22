<?php 
require_once('config/koneksi.php');
$db = pdo_connect_mysql();
/*error_reporting(0);*/
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
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		switch ($page) {
			case 'login':
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