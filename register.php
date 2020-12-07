<?php
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
			include 'form.php';
	 	}
	 	else
	 	{	
	 	$db = new PDO('mysql:host=localhost;dbname=forumdiscussion', "root", "");
		$state = $db->prepare("insert into user values (null, :username, :fullname, :email, :telp, :gender, :alamat, :user_type, :tanggal_lahir, :password)");
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
			echo "<script>alert('Selamat Anda Sudah Terdaftar ! Silahkan Log In');location.href='login.php';</script>";
			}else {
			echo "<script>alert('Gagal Input ke DATABASE !');location.href='register.php';</script>";
			}	
	 	}
	}
else
	// tampilkan kembali form
	include 'form.php';
?> 