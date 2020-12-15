<?php
$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $pdo->prepare('SELECT * FROM question,topik WHERE question.id_topik = topik.id_topik and id_user=:id and id_question=:id_question');
$query->bindValue(':id', $_SESSION['idUser']);
$query->bindValue(':id_question', $_GET['id']);
$query->execute();
$data = $query->fetch();
?>
<form action="#" method="post">
	<?php 
		$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare('SELECT * FROM topik');
		$query->execute();
		$topiks = $query->fetchAll();
		?>
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<select class="" name="topik">
			<?php foreach($topiks as $topik) { ?>
				<option value="<?php echo $topik['id_topik'] ?>" <?php if($data['id_topik'] == $topik['id_topik']) { echo "selected"; } ?>><?php echo $topik['judul']?></option>
			<?php } ?>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['topik']?><br>
		<textarea rows="4" cols="50" name="isi"><?php echo $data['isi'];?></textarea>
		<?php if(isset($_POST['submit'])) echo $errors['isi']?>
		<br>
		<input type="submit" name="submit" value="Edit Pertanyaan">
</form>
