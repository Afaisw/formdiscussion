<div class="form-control">
<form action="#" method="post">
	<?php 
		$query = $db->prepare('SELECT * FROM tb_topik'); //menampilkan semua topik
		$query->execute();
		$topiks = $query->fetchAll();
		?>
		<select class="select-topik" name="topik">
			<option value="" disabled selected>- Pilih Topik -</option>
			<?php foreach($topiks as $topik) { ?> <!-- menampilkan topik sudah diselect -->
				<option value="<?php echo $topik['ID_TOPIK'] ?>"><?php echo $topik['JUDUL']?></option>
			<?php } ?>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['topik']?><br> 
		<textarea rows="4" cols="50" name="isi"></textarea>
		<?php if(isset($_POST['submit'])) echo $errors['isi']?> <!-- menampilkan error jika tidak diisi -->
		<br>
		<input type="submit" name="submit" value="Ajukan Pertanyaan">
</form>
</div>
