<form action="#" method="post">
	
	<textarea rows="4" cols="50" name="isi"></textarea>
	<?php if(isset($_POST['submit'])) echo $errors['isi']?>
	<br>
	<input type="submit" name="submit" value="Balas">
</form>
