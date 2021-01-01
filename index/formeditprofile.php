<?php include 'adminPermission.inc'; ?>
<div class="login">
<h1> Edit Profile </h1>
<fieldset>
	<legend>Person Details</legend>
	
	<?php
	$query = $db->prepare('SELECT * FROM tb_user WHERE ID_USER=:id'); //select user yang sedang login
	$query->bindValue(':id', $_SESSION['idUser']);
	$query->execute();
	$data = $query->fetch();?>
	
	<form name="myForm" action="?page=editprofile" method="POST">
		<input type="number" name="id" hidden value="<?php echo $data['ID_USER'];?>">
		<label>Username</label><br>
		<input class="input-control" type="text" name="username" size="31" value="<?php echo $data['USERNAME']?>"> <!-- menampilkan USERNAME user yang sedang login -->
		<?php if(isset($_POST['submit'])) echo $errors['username']?>
		<br>
		<label>Fullname</label><br>
		<input class="input-control" type="text" name="fullname" size="31" value="<?php echo $data['FULLNAME']?>"> <!-- menampilkan FULLNAME user yang sedang login -->
		<?php if(isset($_POST['submit'])) echo $errors['fullname']?>
		<br>
		<label>Email</label><br>
		<input class="input-control" type="text" name="email" size="31" value="<?php echo $data['EMAIL']?>"> <!-- menampilkan EMAIL user yang sedang login -->
		<?php if(isset($_POST['submit'])) echo $errors['email']?>
		<br>
		<label>Nomor Telepon</label><br>
		<input class="input-control" type="text" name="nomor" size="31" value="<?php echo $data['TELP']?>"> <!-- menampilkan Nomor TELP user yang sedang login -->
		<?php if(isset($_POST['submit'])) echo $errors['nomor']?>
		<br>
		<label>Jenis Kelamin</label> <br>
		<input type="radio" name="gender" value="male" <?php if($data['GENDER'] == 'male') echo "checked"?>>Laki - Laki <!-- menampilkan GENDER user yang sedang login -->
		<input type="radio" name="gender" value="female" <?php if($data['GENDER'] == 'female') echo "checked"?>>Perempuan <!-- dengan cara pengecekan dengan yang ada di database --> 
		<?php if(isset($_POST['submit'])) echo $errors['gender']?> 
		<br>
		<label>Alamat</label> <br>
		<input class="input-control" type="text" name="alamat" size="31" value="<?php echo $data['ALAMAT']?>"> <!-- menampilkan ALAMAT user yang sedang login -->
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
		</form>
</fieldset>
</div>