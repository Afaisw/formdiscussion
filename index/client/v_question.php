<?php
if (isset($_POST['submit'])) {
	require 'validate2.inc';
	validateWajib($errors, $_POST, 'topik');
	validateWajib($errors, $_POST, 'isi');
	if($errors){
		include 'formquestion.php';
	} else {
		$db = new PDO('mysql:host=localhost;dbname=forum', "root", "");
		$state = $db->prepare("insert into question values (null, :id_topik, :id_user, :isi ,null,null)");
		$state->bindValue(':id_topik', $_POST['topik']);
		$state->bindValue(':id_user', $_SESSION['idUser']);
		$state->bindValue(':isi', $_POST['isi']);
		$state->execute();
		if ($state)
		{
			echo "<script>alert('Pertanyaan Berhasil Diajukan');location.href='?page=v_question';</script>";
		} else {
			echo "<script>alert('Pertanyaan Gagal Diajukan');location.href='?page=v_question';</script>";
		}	
	}
} else {
	include 'formquestion.php';
} ?>

<ul>
	<?php 
	include 'adminPermission.inc'; 
	$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT * FROM question,topik WHERE question.id_topik = topik.id_topik and id_user=:id');
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetchAll();
	?>
	<?php foreach ($data as $question) { ?>
	<a href="?page=detailquestion&id=<?=$question['id_question']; ?>" class="question">
		<li>
			<div class="topik"><?php echo $question['judul']?></div>
			<div class="isi"><?php echo $question['isi'] ?></div>
			<div class="tanggal"><?php echo $question['tanggal_dibuat'] ?></div>
		</li>
	</a>
	<?php } ?>
</ul>