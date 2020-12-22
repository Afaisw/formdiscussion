<form action="#" method="post">
    <?php include 'adminPermission.inc'; 
	$statement = $db->prepare("SELECT b.jawaban, b.id_question FROM `tb_answer` b, `tb_question` a WHERE b.id_question=a.id_question and b.id_answer=:id");
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    $answer = $statement->fetch(); ?> <!-- menampilkan data yang sudah diselect sebelumnya -->
    <input type="hidden" name="id_question" value="<?php echo $answer['id_question'];?>">
    <textarea rows="4" cols="50" name="isi"><?php echo $answer['jawaban']; ?></textarea>
	<?php if(isset($_POST['submit'])) echo $errors['isi']?>
	<br>
	<input type="submit" name="submit" value="Edit">
</form>
