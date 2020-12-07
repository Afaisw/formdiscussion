<?php include 'adminPermission.inc'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div class="box">
	<a href="logout.php">logout</a>
<h1> Edit Profile </h1>
<fieldset>
	<legend>Person Details</legend>
	<?php
	$pdo = new PDO ('mysql:host=localhost;dbname=forumdiscussion','root','');
	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT * FROM user WHERE id=:id');
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetch();?>
	<form name="myForm" action="editprofile.php" method="POST">
		<input type="number" name="id" hidden value="<?php echo $data['id'];?>">
		<table>
		<tr>
			<td class="right"><label>Username</label></td>
			<td><input class="field" type="text" name="username" size="31" value="<?php echo $data['username']?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['username']?></td>
		</tr>
		<tr>
			<td class="right"><label>Fullname</label></td>
			<td><input class="field" type="text" name="fullname" size="31" value="<?php echo $data['fullname']?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['fullname']?></td>
		</tr>
		<tr>
			<td class="right"><label>Email</label></td>
			<td><input class="field" type="text" name="email" size="31" value="<?php echo $data['email']?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['email']?></td>
		</tr>
		<tr>
			<td class="right"><label>Nomor Telepon</label></td>
			<td><input class="field" type="text" name="nomor" size="31" value="<?php echo $data['telp']?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['nomor']?></td>
		</tr>
		<tr>
			<td class="right"><label>Jenis Kelamin</label></td>
			<td><input class="field" type="radio" name="gender" value="male" <?php if($data['gender'] == 'male') echo "checked"?>>Laki - Laki
			<input class="field" type="radio" name="gender" value="female" <?php if($data['gender'] == 'female') echo "checked"?>>Perempuan</td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['gender']?></td>
		</tr>
		<tr>
			<td class="right"><label>Alamat</label></td>
			<td><input class="field" type="text" name="alamat" size="31" value="<?php echo $data['alamat']?>"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['alamat']?></td>
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
			<td class="right"><label>Masukan Password Lama</label></td>
			<td><input class="field" type="password" name="password" size="31"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['password']?></td>
		</tr>
		<tr>
			<td class="right"><label>Konfirm Password</label></td>
			<td><input class="field" type="password" name="password2" size="31"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['password2']?></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" value="Update" name="submit" class="button"> <input type="reset" name="reset" value="Reset" class="button"></td>
		</tr>
		</table>
	</form>
</fieldset>
</div>
</body>
</html>