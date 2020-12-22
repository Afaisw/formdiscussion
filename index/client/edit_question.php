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
				echo "<script>alert('Pertanyaan Berhasil Diedit');location.href='?page=detailquestion&id=$id';</script>"; //redirect
			} else {
				echo "<script>alert('Pertanyaan Gagal Diedit');location.href='?page=detailquestion&id=$id';</script>";
			}	
		}
	} else {
		include 'formeditquestion.php';
	} 	