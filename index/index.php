<?php 
include 'adminPermission.inc';
require_once('../config/koneksi.php');
$db = pdo_connect_mysql();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css.css">
</head>
<script type="text/javascript">
</script>
<body>
<div class="top-menu"></div>
<div class="menu">
	<div class="menu">
		<ul>
			<li><a href="logout.php">Logout</a></li>
			<?php if ($_SESSION['type'] == 'expert') {?>
				<li><a href="?page=all_question">Lihat Pertanyaan</a></li>
				<li><a href="?page=discuss">Diskusi Saya</a></li>
			<?php } ?>
			<?php if ($_SESSION['type'] == 'client') {?>
				<li><a href="?page=v_question">Diskusi</a></li>
				<li><a href="?page=clientallquestion">Semua Pertanyan</a></li>
				<li><a href="?page=addtopik">Tambah Topik</a></li>
			<?php } ?> 
		</ul>
	</div>
</div>
<div class="container">
	<div class="kiri">
		Login As <?php echo $_SESSION['isLogin']?><br>
		Type User <?php echo $_SESSION['type']?><br>
		<a href="?page=editprofile">Edit Profile</a><br>
		<a href="?page=changepassword">Change Password</a>
	</div>
	<div class="kanan">
		<?php
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			switch ($page) {
				case 'editprofile':
					include 'editprofile.php';
					break;
				case 'changepassword':
					include 'gantipassword.php';
					break;
				case 'addtopik':
					include 'client/add_topik.php';
					break;
				case 'v_question':
					include 'client/v_question.php';
					break;
				case 'detailquestion':
					include 'client/detail_question.php';
					break;
				case 'clientallquestion':
					include 'client/v_all_question.php';
					break;
				case 'all_question':
					include 'expert/all_question.php';
					break;
				case 'reply_quest':
					include 'expert/reply_quest.php';
					break;
				case 'discuss':
					include 'expert/discuss.php';
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