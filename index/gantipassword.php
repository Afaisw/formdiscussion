<?php 
include 'adminPermission.inc'; 
$errors = array();
if (isset($_POST['submit']))
	{
	require '../config/validate.inc';
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
	 	$query = $db->prepare('SELECT * FROM tb_user WHERE ID_USER=:id');
		$query->bindValue(':id', $_SESSION['idUser']);
		$query->execute();
		$data = $query->fetch();
		if ($data['PASSWORD'] == hash("sha256",$_POST['passwordlama'])) //pengecekan apakah password yang diinput sama dengan yang ada di database
			{
			$state = $db->prepare("update tb_user set PASSWORD:=SHA2(:passwordbaru,0) where ID_USER=:id"); //mengupdate password lama dengan yang baru
			$state->bindValue(':passwordbaru', $_POST['passwordbaru']);
			$state->bindValue(':id', $_SESSION['idUser']);
			$state->execute();	
			if ($state)
				{
				echo "<script>alert('Password Berhasil di update');location.href='?page=changepassword';</script>";
				}
		}else {
			echo "<script>alert('Password salah');location.href='?page=changepassword';</script>";
		}	
	}
}
else{
	// tampilkan kembali form
	include 'formgantipassword.php';
}
?> 