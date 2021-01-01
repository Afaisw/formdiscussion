<ul>
	<?php 
	include 'adminPermission.inc'; 
	$statement = $db->prepare("SELECT DISTINCT a.fullname, b.pertanyaan, b.id_question, b.tanggal_dibuat_question, c.judul FROM `tb_user` a, `tb_question` b, `tb_topik` c, `tb_answer` d WHERE a.id_user=b.id_user AND b.id_topik=c.id_topik AND b.id_question=d.id_question AND d.id_user=:id"); //select pertanyaan yang sudah dijawab oleh user yang sudah login
    $statement->bindValue(':id', $_SESSION['idUser']);
    $statement->execute();
	
	foreach ($statement as $row) { ?> <!-- menampilkan perbaris data yang sudah dipanggil -->
	<li class="list-control">
		<a href="?page=reply_quest&id=<?=$row['id_question']; ?>" class="question">
			<h3 class="nama"><?php echo $row['fullname']?></h3>
			<div class="topik"><?php echo $row['judul']?> </div>
			<div class="isi"><?php echo $row['pertanyaan'] ?></div>
			<div class="tanggal"><?php echo $row['tanggal_dibuat_question'] ?></div>
		</a>
	</li>
	<?php } ?>
</ul>