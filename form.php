<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div class="box">
<h1> Register Person </h1>
<fieldset>
	<legend>Person Details</legend>
	<form name="myForm" action="register.php" method="POST">
		<table>
		<tr>
			<td class="right"><label>Username</label></td>
			<td><input class="field" type="text" name="username" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['username'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['username']?></td>
		</tr>
		<tr>
			<td class="right"><label>Fullname</label></td>
			<td><input class="field" type="text" name="fullname" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['fullname'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['fullname']?></td>
		</tr>
		<tr>
			<td class="right"><label>Email</label></td>
			<td><input class="field" type="text" name="email" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['email'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['email']?></td>
		</tr>
		<tr>
			<td class="right"><label>Nomor Telepon</label></td>
			<td><input class="field" type="text" name="nomor" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['nomor'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['nomor']?></td>
		</tr>
		<tr>
			<td class="right"><label>Jenis Kelamin</label></td>
			<td><input class="field" type="radio" name="gender" value="male" checked>Laki - Laki
			<input class="field" type="radio" name="gender" value="female">Perempuan</td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['gender']?></td>
		</tr>
		<tr>
			<td class="right"><label>Alamat</label></td>
			<td><input class="field" type="text" name="alamat" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['alamat'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['alamat']?></td>
		</tr>
		<tr>
			<td class="right"><label>Tanggal Lahir</label></td>
			<td><input class="field" type="date" name="tgl"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['tgl']?></td>
		</tr>
		<tr>
			<td class="right"><label>Type User</label></td>
			<td><select name="type">
				<option value="expert">Expert</option>
				<option value="client">Client</option>
			</select>
			</td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['type']?></td>
		</tr>
		<tr>
			<td class="right"><label>Password</label></td>
			<td><input class="field" type="password" name="password" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['password']?></td>
		</tr>
		<tr>
			<td class="right"><label>Konfirm Password</label></td>
			<td><input class="field" type="password" name="password2" size="31" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password2'])?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['password2']?></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" value="Register" name="submit" class="button"><input type="reset" name="reset" value="Reset" class="button"></td>
		</tr>
		</table>
	</form>
</fieldset>
</div>
</body>
</html>