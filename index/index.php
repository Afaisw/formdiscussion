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
				<li><a href="?page=all_question">Lihat Pertanyaan</a></li>
			<?php } ?>
			<?php if ($_SESSION['type'] == 'client') {?>
				<li><a href="?page=v_question">Diskusi</a></li>
			<?php } ?> 
		</ul>
	</div>
</div>
<div class="container">
	<div class="kiri">
		Login As <?php echo $_SESSION['isLogin']?><br>
		Type User <?php echo $_SESSION['type']?><br>
		<a href="?page=editprofile">Edit Profile</a>
	</div>
	<div class="kanan">
		<?php
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			switch ($page) {
				case 'editprofile':
					include 'editprofile.php';
					break;
				case 'v_question':
					include 'client/v_question.php';
					break;
				case 'detailquestion':
					include 'client/detail_question.php';
				case 'all_question':
					include 'expert/all_question.php';
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