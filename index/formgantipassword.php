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
	<a href="editprofile.php">Edit Profile</a>
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
	<form name="myForm" action="gantipassword.php" method="POST">
		<input type="number" name="id" hidden value="<?php echo $data['id'];?>">
		<table>
		<tr>
			<td class="right"><label>Masukan Password Lama</label></td>
			<td><input class="field" type="password" name="passwordlama" size="31"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['passwordlama']?></td>
		</tr>
		<tr>
			<td class="right"><label>Masukan Password Baru</label></td>
			<td><input class="field" type="password" name="passwordbaru" size="31"></td>
			<td class="error"><?php if(isset($_POST['submit'])) echo $errors['passwordbaru']?></td>
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