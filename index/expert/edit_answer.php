<?php
if (isset($_POST['submit'])) {
		require '../config/validate.inc';
		validateWajib($errors, $_POST, 'isi');//validasi inputan
		if($errors){
			include 'formeditanswer.php';
		} else {
            $id_question = $_POST['id_question']; //mengambil id pertanyaan
			$state = $db->prepare("update tb_answer set JAWABAN=:reply where ID_ANSWER=:id"); //mengupdate data yang di klik sebelumnya
            $state->bindValue(':reply', $_POST['isi']);
            $state->bindValue(':id', $_GET['id']);
			$state->execute();
			if ($state)
			{
				echo "<script>alert('Balasan Berhasil Diajukan');location.href='?page=reply_quest&id=$id_question';</script>";
			} else {
				echo "<script>alert('Balasan Gagal Diajukan');location.href='?page=reply_quest&id=$id_question';</script>";
			}	
		}
	} else {
        include 'formeditanswer.php';
    } 
?>