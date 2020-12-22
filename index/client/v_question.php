<?php
include 'adminPermission.inc';
?>

<ul>
	<?php
	if (isset($_POST['submit'])) { // jika tombol submit di klik
		require '../config/validate.inc'; //validasi perfield yang diinput
		validateWajib($errors, $_POST, 'topik');
		validateWajib($errors, $_POST, 'isi');
		if($errors){
			include 'formquestion.php';
		} else {
			$state = $db->prepare("insert into tb_question values (null, :id_user, :id_topik, :isi ,:tgl)"); //input data yang sudah tervalidasi
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
	$query = $db->prepare('SELECT * FROM tb_question, tb_topik WHERE tb_question.ID_TOPIK = tb_topik.ID_TOPIK and ID_USER=:id'); //select seluruh pertanyaan yang ditanyakan oleh user yang sedang login
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetchAll();
	
	foreach ($data as $question) { ?>
	<a href="?page=detailquestion&id=<?=$question['ID_QUESTION']; ?>" class="question"> <!-- menampilkan ID pertanyaan yang sudah diselect -->
		<li>
			<div class="topik"><?php echo $question['JUDUL']?></div> <!-- menampilkan JUDUL pertanyaan yang sudah diselect -->
			<div class="isi"><?php echo $question['PERTANYAAN']?></div> <!-- menampilkan pertanyaan yang sudah diselect -->
			<div class="tanggal"><?php echo $question['TANGGAL_DIBUAT_QUESTION']?></div> <!-- menampilkan tanggal pertanyaan yang sudah diselect -->
		</li>
	</a>
	<?php } ?>
</ul>