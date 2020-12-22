<?php //menampilkan data sebelum diedit
$query = $db->prepare('SELECT * FROM tb_user, tb_question, tb_topik WHERE tb_question.ID_TOPIK = tb_topik.ID_TOPIK and tb_user.ID_USER = tb_question.ID_USER and ID_QUESTION=:id_question'); //select pertanyaan yang sudah diklik di link sebelumnya
$query->bindValue(':id_question', $_GET['id']);
$query->execute();
$data = $query->fetch();
?> 
<form action="#" method="post">
	<?php 
		$query = $db->prepare('SELECT * FROM tb_topik'); //menampilkan seluruh topik untuk dipilih
		$query->execute();
		$topiks = $query->fetchAll();
		?>
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<select class="" name="topik">
			<?php foreach($topiks as $topik) { ?>
				<option value="<?php echo $topik['ID_TOPIK'] ?>" <?php if($data['ID_TOPIK'] == $topik['ID_TOPIK']) { echo "selected"; } ?>><?php echo $topik['JUDUL']?></option>
			<?php } ?>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['topik']?><br>
		<textarea rows="4" cols="50" name="isi"><?php echo $data['PERTANYAAN'];?></textarea>
		<?php if(isset($_POST['submit'])) echo $errors['isi']?>
		<br>
		<div class="tanggal"><?php echo $data['TANGGAL_DIBUAT_QUESTION'] ?></div>
		<input type="submit" name="submit" value="Edit Pertanyaan">
</form>
