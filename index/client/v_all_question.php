<ul>
	<?php 
	include 'adminPermission.inc'; 
	$statement = $db->prepare("SELECT * FROM tb_user,tb_question,tb_topik WHERE tb_user.ID_USER=tb_question.ID_USER AND tb_topik.ID_TOPIK=tb_question.ID_TOPIK");
    $statement->execute();	
	foreach ($statement as $row) { ?>
	<a href="?page=detailquestion&id=<?=$row['ID_QUESTION']; ?>" class="question">
		<li>
			<h1><?php echo $row['FULLNAME']?></h1>
            <div class="topik"><?php echo $row['JUDUL'] ?></div>
			<div class="isi"><?php echo $row['PERTANYAAN'] ?></div>
			<div class="tanggal"><?php echo $row['TANGGAL_DIBUAT_QUESTION'] ?></div>
		</li>
	</a>
	<?php } ?>
</ul>