<div class="login">
<h1> Register Person </h1>
<fieldset>
	<legend>Person Details</legend>
	<form action="?page=register" method="POST">
		<input class="input-control" type="text" placeholder="Username" name="username" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['username'])?>"> <!-- value berisikan data yang sebelumnya diisi -->
		<?php if(isset($_POST['submit'])) echo $errors['username'] //menampilkan error jika tidak sesuai dengan validasi?>
		
		<input class="input-control" type="text" name="fullname" placeholder="FullName" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['fullname'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['fullname']?>

		<input class="input-control" type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['email'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['email']?>

		<input class="input-control" type="text" name="nomor" placeholder="Nomor Telepon" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['nomor'])?>">
		<?php if(isset($_POST['submit'])) echo $errors['nomor']?><br>

		<input type="radio" name="gender" value="male" checked>Laki - Laki
			<input type="radio" name="gender" value="female">Perempuan
			<?php if(isset($_POST['submit'])) echo $errors['gender']?>
			<br>

		<input class="input-control" type="text" name="alamat" placeholder="Alamat" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['alamat'])?>">
			<?php if(isset($_POST['submit'])) echo $errors['alamat']?><br>

		<label>Tanggal Lahir</label><br>
			<input class="input-control" type="date" name="tgl">
			<?php if(isset($_POST['submit'])) echo $errors['tgl']?><br>

		<label>Type User</label><br>
			<select class="input-control" name="type">
				<option value="expert">Expert</option>
				<option value="client">Client</option>
			</select>
			<?php if(isset($_POST['submit'])) echo $errors['type']?>

		<input class="input-control" type="password" name="password"  placeholder="Password"  value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password'])?>"><?php if(isset($_POST['submit'])) echo $errors['password']?>

		<input class="input-control" type="password" name="password2"  placeholder="Konfirmasi password"  value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password2'])?>"><?php if(isset($_POST['submit'])) echo $errors['password2']?>
		<br>
		<input type="submit" value="Register" name="submit" class="button">

	</form>
</fieldset>
</div>