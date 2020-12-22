<form action="#" method="post">
	<?php 
		$query = $db->prepare('SELECT * FROM tb_topik');
		$query->execute();
		$topiks = $query->fetchAll();
		?>
		<select class="" name="topik">
			<option value="" disabled selected>- Pilih Topik -</option>
			<?php foreach($topiks as $topik) { ?>
				<option value="<?php echo $topik['ID_TOPIK'] ?>"><?php echo $topik['JUDUL']?></option>
			<?php } ?>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['topik']?><br>
		<textarea rows="4" cols="50" name="isi"></textarea>
		<?php if(isset($_POST['submit'])) echo $errors['isi']?>
		<br>
		<input type="submit" name="submit" value="Ajukan Pertanyaan">
</form>
