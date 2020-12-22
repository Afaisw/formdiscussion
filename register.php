<?php
$errors = array();
if (isset($_POST['submit']))
	{
		//validasi data yang diinput
		require 'config/validate.inc';
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
	 	if ($errors) //jika ada error / field yang tidak sesuai dengan validasi
		{
	 	// tampilkan kembali form
			include 'formregister.php';
	 	}
	 	else
	 	{
		//jika field sudah benar maka akan diinput ke database
		$state = $db->prepare("insert into tb_user values (null, :username, :fullname, :email, :telp, :gender, :alamat, :user_type, :tanggal_lahir, SHA2(:password,0))");
		$state->bindValue(':username', $_POST['username']);
		$state->bindValue(':fullname', $_POST['fullname']);
		$state->bindValue(':email', $_POST['email']);
		$state->bindValue(':telp', $_POST['nomor']);
		$state->bindValue(':gender', $_POST['gender']);
		$state->bindValue(':alamat', $_POST['alamat']);
		$state->bindValue(':user_type', $_POST['type']);
		$state->bindValue(':tanggal_lahir', $_POST['tgl']);
		$state->bindValue(':password', $_POST['password']);
		$state->execute();
		if ($state)
			{
			// akan memunculkan notif dan direct ke lokasi yang di tuju
			echo "<script>alert('Selamat Anda Sudah Terdaftar ! Silahkan Log In');location.href='?page=login';</script>";
			}else {
			echo "<script>alert('Gagal Input ke DATABASE !');location.href='?page=register';</script>";
			}	
	 	}
	}
else
	// tampilkan kembali form
	include 'formregister.php';
?> 