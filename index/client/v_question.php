<?php
include 'adminPermission.inc';
?>

<ul>
	<?php
	if (isset($_POST['submit'])) {
		require '../config/validate.inc';
		validateWajib($errors, $_POST, 'topik');
		validateWajib($errors, $_POST, 'isi');
		if($errors){
			include 'formquestion.php';
		} else {
			$state = $db->prepare("insert into tb_question values (null, :id_user, :id_topik, :isi ,:tgl)");
			$state->bindValue(':id_topik', $_POST['topik']);
			$state->bindValue(':id_user', $_SESSION['idUser']);
			$state->bindValue(':isi', $_POST['isi']);
			$state->bindValue(':tgl', date("Y-m-d H:i:s"));
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
	} 
	$query = $db->prepare('SELECT * FROM tb_question, tb_topik WHERE tb_question.ID_TOPIK = tb_topik.ID_TOPIK and ID_USER=:id');
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetchAll();
	
	foreach ($data as $question) { ?>
	<a href="?page=detailquestion&id=<?=$question['ID_QUESTION']; ?>" class="question">
		<li>
			<div class="topik"><?php echo $question['JUDUL']?></div>
			<div class="isi"><?php echo $question['PERTANYAAN']?></div>
			<div class="tanggal"><?php echo $question['TANGGAL_DIBUAT_QUESTION']?></div>
		</li>
	</a>
	<?php } ?>
</ul>