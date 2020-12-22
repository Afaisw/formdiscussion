<ul>
	<?php 
	include 'adminPermission.inc'; 
	$statement = $db->prepare("SELECT DISTINCT a.fullname, b.pertanyaan, b.id_question, b.tanggal_dibuat_question, c.judul FROM `tb_user` a, `tb_question` b, `tb_topik` c, `tb_answer` d WHERE a.id_user=b.id_user AND b.id_topik=c.id_topik AND b.id_question=d.id_question AND d.id_user=:id");
    $statement->bindValue(':id', $_SESSION['idUser']);
    $statement->execute();
	
	foreach ($statement as $row) { ?>
	<a href="?page=reply_quest&id=<?=$row['id_question']; ?>" class="question">
		<li>
			<h1><?php echo $row['fullname']?></h1>
			<div class="isi"><?php echo $row['judul']." ".$row['tanggal_dibuat_question'] ?></div>
			<div class="tanggal"><?php echo $row['pertanyaan'] ?></div>
		</li>
	</a>
	<?php } ?>
</ul>