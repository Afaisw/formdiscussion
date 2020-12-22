<ul>
	<?php 
	include 'adminPermission.inc'; 
	$statement = $db->prepare("SELECT * FROM tb_user,tb_question,tb_topik WHERE tb_user.ID_USER=tb_question.ID_USER AND tb_topik.ID_TOPIK=tb_question.ID_TOPIK"); //menampilkan seluruh pertanyaan
    $statement->execute();	
	foreach ($statement as $row) { ?>
	<a href="?page=detailquestion&id=<?=$row['ID_QUESTION']; ?>" class="question"> <!-- menampilkan ID pertanyaan yang sudah diselect -->
		<li>
			<h2><?php echo $row['FULLNAME']?></h2> <!-- menampilkan Nama yang mengajukan pertanyaan pada data yang sudah diselect -->
            <div class="topik"><?php echo $row['JUDUL'] ?></div> <!-- menampilkan judul pertanyaan yang sudah diselect -->
			<div class="isi"><?php echo $row['PERTANYAAN'] ?></div> <!-- menampilkan pertanyaan yang sudah diselect -->
			<div class="tanggal"><?php echo $row['TANGGAL_DIBUAT_QUESTION'] ?></div> <!-- menampilkan tanggal pertanyaan yang sudah diselect -->
		</li>
	</a>
	<?php } ?>
</ul>