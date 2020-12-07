<?php
	function checkPassword()
	{
		$pdo = new PDO ('mysql:host=localhost;dbname=forumdiscussion','root','');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$query = $pdo->prepare('SELECT * FROM user WHERE username = :username and password = SHA2(:password,0)');
			$query->bindValue(':username', $_POST['username']);
			$query->bindValue(':password', $_POST['password']);
			$query->execute();
			return $query->rowCount()>0;
		} catch (PDOException $e) {
			echo "<script>alert('Login gagal !');location.href='login.php';</script>";
			
		}
			
	}
?>