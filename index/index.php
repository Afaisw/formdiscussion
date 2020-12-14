<?php include 'adminPermission.inc'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css.css">
</head>
<body>
<div class="top-menu"></div>
<div class="menu">
	<div class="menu">
		<ul>
			<li><a href="logout.php">Logout</a></li>
			<?php if ($_SESSION['type'] == 'expert') {?>
				<li><a href="#">Lihat Pertanyaan</a></li>
			<?php } ?>
			<?php if ($_SESSION['type'] == 'client') {?>
				<li><a href="#">Diskusi</a></li>
			<?php } ?> 
		</ul>
	</div>
</div>
<div class="container">
<div class="isi">
	<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		switch ($page) {
			case 'editprofile':
				include 'editprofile.php';
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