<form action="#" method="post">
	<?php 
		$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare('SELECT * FROM topik');
		$query->execute();
		$topiks = $query->fetchAll();
		?>
		<select class="" name="topik">
			<option value="" disabled selected>- Pilih Topik -</option>
			<?php foreach($topiks as $topik) { ?>
				<option value="<?php echo $topik['id_topik'] ?>"><?php echo $topik['judul']?></option>
			<?php } ?>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['topik']?><br>
		<textarea rows="4" cols="50" name="isi"></textarea>
		<?php if(isset($_POST['submit'])) echo $errors['isi']?>
		<br>
		<input type="submit" name="submit" value="Ajukan Pertanyaan">
</form>
