<ul>
<?php //menampilkan pertanyaan yang sudah diklik
    include 'adminPermission.inc'; 
    $statement = $db->prepare('SELECT a.fullname, b.pertanyaan, b.id_question, b.tanggal_dibuat_question, c.judul FROM `tb_user` a, `tb_question` b, `tb_topik` c WHERE b.id_topik = c.id_topik AND a.id_user=b.id_user AND b.id_question=:id');
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    $data = $statement->fetchAll();
	
	foreach ($data as $row) { ?>
	<li class="list-control">
		<h3 class="nama"><?php echo $row['fullname']?></h3>
		<div class="topik"><?php echo $row['judul']?></div>
		<div class="isi"><?php echo $row['pertanyaan'] ?></div>
		<div class="tanggal"><?php echo $row['tanggal_dibuat_question'] ?></div>
	</li>
    <?php } 
	//menampilkan jawaban sebelumnya
    $query = $db->prepare('SELECT c.fullname, a.tanggal_jawaban, a.jawaban, a.id_answer, a.id_user FROM `tb_answer` a, `tb_question` b, `tb_user` c WHERE a.id_question=:id AND a.id_question=b.id_question AND a.id_user=c.id_user ORDER BY a.tanggal_jawaban');
    $query->bindValue(':id', $_GET['id']);
    $query->execute();
	$data = $query->fetchAll();
	foreach ($data as $answer) { ?>
	<li class="list-control-answer">
        <h3 class="nama"><?php echo $answer['fullname']?></h3>
		<div class="isi"><?php echo $answer['jawaban'] ?></div>
		<div class="tanggal"><?php echo $answer['tanggal_jawaban'] ?></div>
		<?php if ($_SESSION['idUser'] == $answer['id_user']) {?> 
		<a class="btn" href="?page=editanswer&id=<?=$answer['id_answer']; ?>">Edit</a>
	</li>
</ul>
	<?php }
	
	}


	//menginputkan / menambahkan jawaban ke database
    if (isset($_POST['submit'])) {
		require '../config/validate.inc';
		validateWajib($errors, $_POST, 'isi');
		if($errors){
			include 'formreply.php';
		} else {
			$id = $_GET['id'];
			$state = $db->prepare("insert into tb_answer values (null, :id_user, :id_question, :reply ,:tgl)");
			$state->bindValue(':id_question', $_GET['id']);
			$state->bindValue(':id_user', $_SESSION['idUser']);
			$state->bindValue(':reply', $_POST['isi']);
			$state->bindValue(':tgl', date("Y-m-d H:i:s"));
			$state->execute();
			if ($state)
			{
				echo "<script>alert('Balasan Berhasil Diajukan');location.href='?page=reply_quest&id=$id';</script>";
			} else {
				echo "<script>alert('Balasan Gagal Diajukan');location.href='?page=reply_quest&id=$id';</script>";
			}	
		}
	} else {
        include 'formreply.php';
    } 
?>