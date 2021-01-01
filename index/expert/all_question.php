<ul>
	<?php 
	include 'adminPermission.inc';  //cek apakah sudah login atau belum
	$statement = $db->prepare("SELECT a.fullname, b.pertanyaan, b.id_question, b.tanggal_dibuat_question, c.judul FROM `tb_user` a, `tb_question` b, `tb_topik` c WHERE a.id_user=b.id_user AND b.id_topik=c.id_topik"); //sql untuk select semua pertanyaan
    $statement->execute();
	
	foreach ($statement as $row) { ?> <!-- looping semua data yang sudah diambil di sql sebelumnya, lalu ditampilkan sesuai fieldnya -->
	<li class="list-control">
		<a href="?page=reply_quest&id=<?=$row['id_question']; ?>" class="question">
			<h3 class="nama"><?php echo $row['fullname']?></h3>
			<div class="topik"><?php echo $row['judul']?></div>
			<div class="isi"><?php echo $row['pertanyaan'] ?></div>
			<div class="tanggal"><?php echo $row['tanggal_dibuat_question'] ?></div>
		</a>
	</li>
	<?php } ?>
</ul>