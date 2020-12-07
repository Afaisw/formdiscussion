<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<form action="login.php" method="POST">
		<table class="preview">
			<tr>
				<th colspan="2"><h2>Login</h2></th>
			</tr>
			<?php
				if (isset($_POST['login']))
				{
					$pdo = new PDO ('mysql:host=localhost;dbname=forumdiscussion','root','');
					$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $pdo->prepare('SELECT * FROM user WHERE username = :username and password = md5(:password)');
					$query->bindValue(':username', $_POST['username']);
					$query->bindValue(':password', $_POST['password']);
					$query->execute();
					if($query->rowCount()>0)
					{
						$row = $query->fetch();
						session_start();
						$_SESSION['isLogin'] = $_POST['username'];
						$_SESSION['idUser'] = $row['id'];
						echo "<script>alert('Login gagal !');</script>";
						header('Location: index/editprofile.php');
					}else{
						echo "<script>alert('Login gagal !');location.href='login.php';</script>";
					}
				}
			?>
			<tr>
				<td><label>Username </label></td>
				<td><input type="text" name="username" size="31"/></td>
			</tr>
			<tr>
				<td><label>Password </label></td>
				<td><input type="password" name="password" size="31"/></td>
			</tr>
			<tr>
				<td class="center"><input class="btn" type="submit" value="Login" name="login"/></td>
				<td><a href="register.php"><input type="button" name="" value="Register"></a></td>
			</tr>
		</table>
	</form>
</body>
</html>