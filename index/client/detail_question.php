<ul>
	<?php
	include 'adminPermission.inc'; 
	$id = $_GET['id'];
	if (isset($_POST['submit'])) {
		require '../config/validate.inc';
		validateWajib($errors, $_POST, 'topik');
		validateWajib($errors, $_POST, 'isi');
		if($errors){
			include 'formeditquestion.php';
		} else {
			$state = $db->prepare("update tb_question set ID_TOPIK=:id_topik , PERTANYAAN=:isi where ID_QUESTION=:id_question");
			$state->bindValue(':id_topik', $_POST['topik']);
			$state->bindValue(':id_question', $id);
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
	} 	
	$query = $db->prepare("SELECT * FROM tb_answer where ID_QUESTION =:id");
	$query->bindValue(':id', $id);
	$query->execute();
	$data = $query->fetchAll();
	?>
	<?php foreach ($data as $answer) { ?>
		<li>
			<div class="isi"><?php echo $question['JAWABAN'] ?></div>
			<div class="tanggal"><?php echo $question['TANGGAL_JAWABAN'] ?></div>
		</li>
	<?php } ?>
</ul>