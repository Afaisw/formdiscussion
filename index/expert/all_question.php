<ul>
	<?php 
	include 'adminPermission.inc'; 
	$dbc = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
        
    $statement = $dbc->prepare("SELECT a.fullname, b.isi, b.id_question, c.judul FROM `user` a, `question` b, `topik` c WHERE a.id=b.id_user AND b.id_topic=c.id_topik");
    $statement->execute();
	
	foreach ($statement as $row) { ?>
	<a href="?page=reply_quest&id=<?=$row['id_question']; ?>" class="question">
		<li>
			<h1><?php echo $row['fullname']?></h1>
			<div class="isi"><?php echo $row['judul'] ?></div>
			<div class="tanggal"><?php echo $row['isi'] ?></div>
		</li>
	</a>
	<?php } ?>
</ul>