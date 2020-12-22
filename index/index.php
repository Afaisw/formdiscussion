<?php 
include 'adminPermission.inc'; //mengecek apakah ada session atau tidak , apakah user telah login atau tidak agar tidak bisa asal diakses
require_once('../config/koneksi.php'); //import koneksi database
$db = pdo_connect_mysql(); //start database
error_reporting(0); //menonaktifkan error log
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../asset/css.css"> <!-- mengimport css -->
</head>
<script type="text/javascript">
</script>
<body>
<div class="top-menu"></div>
<div class="menu">
	<div class="menu">
		<ul>
			<li><a href="logout.php">Logout</a></li>
			<?php if ($_SESSION['type'] == 'expert') { //pengecekan apakah user expert atau bukan?> 
				<li><a href="?page=all_question">Lihat Pertanyaan</a></li>
				<li><a href="?page=discuss">Diskusi Saya</a></li>
			<?php } ?>
			<?php if ($_SESSION['type'] == 'client') { //pengecekan apakah user client atau bukan?>
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
				case 'editquestion':
					include 'client/edit_question.php';
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
				case 'editanswer':
					include 'expert/edit_answer.php';
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