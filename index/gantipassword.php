<?php 
include 'adminPermission.inc'; 
$errors = array();
if (isset($_POST['submit']))
	{
		require 'validate2.inc';
	 	validateAlfanumerik($errors, $_POST, 'passwordlama');
	 	validateAlfanumerik($errors, $_POST, 'passwordbaru');
	 	validateConfirm($errors, $_POST, 'passwordbaru', 'password2');
	 	if ($errors)
		{
	 // tampilkan kembali form
			include 'formgantipassword.php';
	 	}
	 	else
	 	{	
	 	$pdo = new PDO ('mysql:host=localhost;dbname=forumdiscussion','root','');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare('SELECT * FROM user WHERE id=:id and password=:passwordlama');
		$query->bindValue(':id', $_POST['id']);
		$query->bindValue(':passwordlama', md5($_POST['passwordlama']));
		$query->execute();
		$data = $query->fetch();
		if ($data['password'] == md5($_POST['passwordlama']))
			{
			$state = $pdo->prepare("update user set password:=passwordbaru where id=:id");
			$state->bindValue(':id', $_POST['id']);
			$state->bindValue(':passwordbaru', md5($_POST['passwordbaru']));
			$state->execute();	
			if ($state)
				{
					echo "<script>alert('Password berhasil di update !');location.href='gantipassword.php';</script>";
				}
			}else {
				echo "<script>alert('password Salah !');location.href='gantipassword.php';</script>";
			}	
	 	}
	}
else
	// tampilkan kembali form
	include 'formgantipassword.php';
?> 