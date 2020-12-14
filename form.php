<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div class="login">
<h1> Register Person </h1>
<fieldset>
	<legend>Person Details</legend>
	<form action="?page=register" method="POST">
		<label>Username</label>
		<input class="input-control" type="text" name="username" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['username'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['username']?>
		
		<label>Fullname</label>
		<input class="input-control" type="text" name="fullname" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['fullname'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['fullname']?>

		<label>Email</label>
		<input class="input-control" type="text" name="email" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['email'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['email']?>

		<label>Nomor Telepon</label>
		<input class="input-control" type="text" name="nomor" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['nomor'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['nomor']?>

		<label>Jenis Kelamin</label><br>
			<input type="radio" name="gender" value="male" checked>Laki - Laki
			<input type="radio" name="gender" value="female">Perempuan
			<?php if(isset($_POST['submit'])) echo $errors['gender']?>
			<br>
		<label>Alamat</label>
			<input class="input-control" type="text" name="alamat" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['alamat'])?>">
			<?php if(isset($_POST['submit'])) echo $errors['alamat']?>

		<label>Tanggal Lahir</label>
			<input class="input-control" type="date" name="tgl">
			<?php if(isset($_POST['submit'])) echo $errors['tgl']?>

		<label>Type User</label>
			<select class="input-control" name="type">
				<option value="expert">Expert</option>
				<option value="client">Client</option>
			</select>
			<?php if(isset($_POST['submit'])) echo $errors['type']?>

		<label>Password</label>
			<input class="input-control" type="password" name="password" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password'])?>"><?php if(isset($_POST['submit'])) echo $errors['password']?>

		<label>Konfirm Password</label></td>
			<input class="input-control" type="password" name="password2" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password2'])?>"><?php if(isset($_POST['submit'])) echo $errors['password2']?>

		<input type="submit" value="Register" name="submit" class="button"><input type="reset" name="reset" value="Reset" class="button">

	</form>
</input-controlset>
</div>
</body>
</html>