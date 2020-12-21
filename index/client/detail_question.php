<?php
$id = $_POST['id'];
if (isset($_POST['submit'])) {
	require 'validate2.inc';
	validateWajib($errors, $_POST, 'topik');
	validateWajib($errors, $_POST, 'isi');
	if($errors){
		include 'formeditquestion.php';
	} else {
		$db = new PDO('mysql:host=localhost;dbname=forum', "root", "");
		$state = $db->prepare("update question set id_topic=:id_topik , isi=:isi where id_question=:id_question");
		$state->bindValue(':id_topik', $_POST['topik']);
		$state->bindValue(':id_question', $_POST['id']);
		$state->bindValue(':isi', $_POST['isi']);
		$state->execute();
		if ($state)
		{
			echo "<script>alert('Pertanyaan Berhasil Diedit');location.href='?page=v_question';</script>";
		} else {
			echo "<script>alert('Pertanyaan Gagal Diedit');location.href='?page=v_question';</script>";
		}	
	}
} else {
	include 'formeditquestion.php';
} ?>

<ul>
	<?php 
	include 'adminPermission.inc'; 
	$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare("SELECT * FROM answer where id_question =:id");
	$query->bindValue(':id', $_POST['id']);
	$query->execute();
	$data = $query->fetchAll();
	?>
	<?php foreach ($data as $answer) { ?>
		<li>
			<div class="isi"><?php echo $question['isi'] ?></div>
			<div class="tanggal"><?php echo $question['tanggal_dibuat'] ?></div>
		</li>
	<?php } ?>
</ul>