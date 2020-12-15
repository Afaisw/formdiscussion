<?php include 'adminPermission.inc'; ?>
<div class="login">
<h1> Edit Profile </h1>
<fieldset>
	<legend>Person Details</legend>
	
	<?php
	$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT * FROM user WHERE id=:id');
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetch();?>
	
	<form name="myForm" action="?pageeditprofile" method="POST">
		<input type="number" name="id" hidden value="<?php echo $data['id'];?>">
		<label>Username</label><br>
		<input class="input-control" type="text" name="username" size="31" value="<?php echo $data['username']?>">
		<?php if(isset($_POST['submit'])) echo $errors['username']?>
		<br>
		<label>Fullname</label><br>
		<input class="input-control" type="text" name="fullname" size="31" value="<?php echo $data['fullname']?>">
		<?php if(isset($_POST['submit'])) echo $errors['fullname']?>
		<br>
		<label>Email</label><br>
		<input class="input-control" type="text" name="email" size="31" value="<?php echo $data['email']?>">
		<?php if(isset($_POST['submit'])) echo $errors['email']?>
		<br>
		<label>Nomor Telepon</label><br>
		<input class="input-control" type="text" name="nomor" size="31" value="<?php echo $data['telp']?>">
		<?php if(isset($_POST['submit'])) echo $errors['nomor']?>
		<br>
		<label>Jenis Kelamin</label> <br>
		<input type="radio" name="gender" value="male" <?php if($data['gender'] == 'male') echo "checked"?>>Laki - Laki
		<input type="radio" name="gender" value="female" <?php if($data['gender'] == 'female') echo "checked"?>>Perempuan
		<?php if(isset($_POST['submit'])) echo $errors['gender']?> 
		<br>
		<label>Alamat</label> <br>
		<input class="input-control" type="text" name="alamat" size="31" value="<?php echo $data['alamat']?>">
		<?php if(isset($_POST['submit'])) echo $errors['alamat']?>
		<br>
		<label>Type User</label><br>
		<select class="input-control" name="type">
			<option value="expert">Expert</option>
			<option value="client">Client</option>
		</select>
		<?php if(isset($_POST['submit'])) echo $errors['type']?> 
		<br>
		<label>Masukan Password Lama</label><br>
		<input class="input-control" type="password" name="password" size="31">
		<?php if(isset($_POST['submit'])) echo $errors['password']?>
		<br>
		<label>Konfirm Password</label><br>
		<input class="input-control" type="password" name="password2" size="31">
		<?php if(isset($_POST['submit'])) echo $errors['password2']?>
		<br>
		<input type="submit" value="Update" name="submit" class="button">
</fieldset>
</div>