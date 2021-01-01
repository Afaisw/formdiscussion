<ul><!-- menampilkan pertanyaan yang di klik -->
	<?php
	$query = $db->prepare('SELECT * FROM tb_user, tb_question, tb_topik WHERE tb_question.ID_TOPIK = tb_topik.ID_TOPIK and tb_user.ID_USER = tb_question.ID_USER and ID_QUESTION=:id_question'); //select pertanyaan yang sudah diklik di link sebelumnya
	$query->bindValue(':id_question', $_GET['id']);
	$query->execute();
	$data = $query->fetch(); ?>
	<li class="list-control">
		<h3 class="nama"><?php echo $data['FULLNAME']?></h3>
		<div class="isi"><?php echo $data['PERTANYAAN'] ?></div>
		<div class="tanggal"><?php echo $data['TANGGAL_DIBUAT_QUESTION'] ?></div>
		<?php if($data['ID_USER'] == $_SESSION['idUser']) { ?>
		<a class="btn" href="?page=editquestion&id=<?=$data['ID_QUESTION']; ?>">Edit</a>
		<?php } ?>
	</li>
	<!-- menampilkan semua jawaban yang sudah dijawab oleh user terhadap pertanyaan diatas -->
	<?php
	$query = $db->prepare("SELECT * FROM tb_user,tb_answer where tb_user.ID_USER=tb_answer.ID_USER and ID_QUESTION =:id order by TANGGAL_JAWABAN"); //select data pertanyaan yang sesuai dengan yang diklik sebelumnya
	$query->bindValue(':id', $_GET['id']);
	$query->execute();
	$data = $query->fetchAll();
	?>
	<?php foreach ($data as $answer) { ?>
		<li class="list-control-answer">
			<h3 class="nama"><?php echo $answer['FULLNAME']?></h3>
			<div class="isi"><?php echo $answer['JAWABAN'] ?></div>
			<div class="tanggal"><?php echo $answer['TANGGAL_JAWABAN'] ?></div>
		</li>
	<?php } ?>
</ul>