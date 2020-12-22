<?php 
include 'adminPermission.inc'; 
$errors = array();
if (isset($_POST['submit']))
	{
	require '../config/validate.inc'; //validasi perfield yang diinput
	validateAlfabet($errors, $_POST, 'username');
	validateAlfabet($errors, $_POST, 'fullname');
	validateEmail($errors, $_POST, 'email');
	validateNumerik($errors, $_POST, 'nomor');
	validateWajib($errors, $_POST, 'gender');
	validateWajib($errors, $_POST, 'alamat');
	validateWajib($errors, $_POST, 'type');
	validateAlfanumerik($errors, $_POST, 'password');
	validateConfirm($errors, $_POST, 'password', 'password2');
	if ($errors)
		{
		// tampilkan kembali form
		include 'formeditprofile.php';
		}
	else
		{	
		$query = $db->prepare('SELECT * FROM tb_user WHERE ID_USER=:id'); //pengecekan user apakah sama dengan yang ada di database
		$query->bindValue(':id', $_POST['id']);
		$query->execute();
		$data = $query->fetch();
		if ($data['PASSWORD'] == hash("sha256", $_POST['password'])) //apakah memiliki password yang sama atau tidak
			{
			$state = $db->prepare("update tb_user set USERNAME=:username, FULLNAME=:fullname, EMAIL=:email, TELP=:telp, GENDER=:gender, ALAMAT=:alamat, USER_TYPE=:user_type where ID_USER=:id"); //update data
			$state->bindValue(':username', $_POST['username']);
			$state->bindValue(':fullname', $_POST['fullname']);
			$state->bindValue(':email', $_POST['email']);
			$state->bindValue(':telp', $_POST['nomor']);
			$state->bindValue(':gender', $_POST['gender']);
			$state->bindValue(':alamat', $_POST['alamat']);
			$state->bindValue(':user_type', $_POST['type']);
			$state->bindValue(':id', $_POST['id']);
			$state->execute();	
			if ($state)
				{
					echo "<script>alert('Data berhasil di update !');location.href='?page=editprofile';</script>";
				}
			} else {
					echo "<script>alert('password salah');location.href='?page=editprofile';</script>";
				}	
			}
	}
else
	// tampilkan kembali form
	include 'formeditprofile.php';
?> 