<?php 
include 'adminPermission.inc'; 
$errors = array();
if (isset($_POST['submit']))
	{
		require 'validate2.inc';
	 	validateAlfabet($errors, $_POST, 'username');
	 	validateAlfabet($errors, $_POST, 'fullname');
	 	validateEmail($errors, $_POST, 'email');
	 	validateNumerik($errors, $_POST, 'nomor');
	 	validateWajib($errors, $_POST, 'gender');
	 	validateWajib($errors, $_POST, 'alamat');
	 	validateWajib($errors, $_POST, 'type');
	 	validateWajib($errors, $_POST, 'tgl');
	 	validateAlfanumerik($errors, $_POST, 'password');
	 	validateConfirm($errors, $_POST, 'password', 'password2');
	 	if ($errors)
		{
	 // tampilkan kembali form
			include 'formeditprofile.php';
	 	}
	 	else
	 	{	
	 	$pdo = new PDO ('mysql:host=localhost;dbname=forumdiscussion','root','');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare('SELECT * FROM user WHERE id=:id and password=:password');
		$query->bindValue(':id', $_POST['id']);
		$query->bindValue(':password', md5($_POST['password']));
		$query->execute();
		$data = $query->fetch();
		if ($data['password'] == md5($_POST['password']))
			{
			$state = $pdo->prepare("update user set username=:username, fullname=:fullname, email=:email, telp=:telp, gender=:gender, alamat=:alamat, user_type=:user_type, tanggal_lahir=:tanggal_lahir where id=:id and password=:password");
			$state->bindValue(':id', $_POST['id']);
			$state->bindValue(':username', $_POST['username']);
			$state->bindValue(':fullname', $_POST['fullname']);
			$state->bindValue(':email', $_POST['email']);
			$state->bindValue(':telp', $_POST['nomor']);
			$state->bindValue(':gender', $_POST['gender']);
			$state->bindValue(':alamat', $_POST['alamat']);
			$state->bindValue(':user_type', $_POST['type']);
			$state->bindValue(':tanggal_lahir', $_POST['tgl']);
			$state->bindValue(':password', md5($_POST['password']));
			$state->execute();	
			if ($state)
				{
					echo "<script>alert('Data berhasil di update !');location.href='editprofile.php';</script>";
				}
			}else {
				echo "<script>alert('password Salah !');location.href='editprofile.php';</script>";
			}	
	 	}
	}
else
	// tampilkan kembali form
	include 'formeditprofile.php';
?> 