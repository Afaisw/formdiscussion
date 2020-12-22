<ul>
	<?php
	include 'adminPermission.inc'; 
	$id = $_GET['id']; //inisialisasi variable id 
	if (isset($_POST['submit'])) {
		require '../config/validate.inc';
		validateWajib($errors, $_POST, 'topik');
		validateWajib($errors, $_POST, 'isi');
		if($errors){
			include 'formeditquestion.php';
		} else {
			$state = $db->prepare("update tb_question set ID_TOPIK=:id_topik , PERTANYAAN=:isi where ID_QUESTION=:id_question"); //mengupdate data jika sudah tervalidasi dengan benar
			$state->bindValue(':id_topik', $_POST['topik']);
			$state->bindValue(':id_question', $id);
			$state->bindValue(':isi', $_POST['isi']);
			$state->execute();
			if ($state)
			{
				echo "<script>alert('Pertanyaan Berhasil Diedit');location.href='?page=v_question';</script>"; //redirect
			} else {
				echo "<script>alert('Pertanyaan Gagal Diedit');location.href='?page=v_question';</script>";
			}	
		}
	} else {
		include 'formeditquestion.php';
	} 	
	$query = $db->prepare("SELECT * FROM tb_user,tb_answer where tb_user.ID_USER=tb_answer.ID_USER and ID_QUESTION =:id"); //select data pertanyaan yang sesuai dengan yang diklik sebelumnya
	$query->bindValue(':id', $id);
	$query->execute();
	$data = $query->fetchAll();
	?>
	<?php foreach ($data as $answer) { ?>
		<li>
			<h2><?php echo $row['FULLNAME']?></h2>
			<div class="isi"><?php echo $question['JAWABAN'] ?></div>
			<div class="tanggal"><?php echo $question['TANGGAL_JAWABAN'] ?></div>
		</li>
	<?php } ?>
</ul>