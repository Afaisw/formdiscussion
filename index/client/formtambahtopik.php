<div class="login">
<h1> Tambah Topik </h1>
<fieldset>
	<legend>Topik Details</legend>
	<form action="?page=addtopik" method="POST">
		<input class="input-control" type="text" placeholder="Judul Topik" name="isi" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['isi'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['isi']?>
        <br>
		<input type="submit" value="Tambah" name="submit" class="button">

	</form>
</fieldset>
</div>