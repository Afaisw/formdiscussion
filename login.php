<form action="" method="POST">
	<div class="login">
		<h2>Login</h2>
			<?php
				if (isset($_POST['login']))
				{
					$pdo = new PDO ('mysql:host=localhost;dbname=forum','root','');
					$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $pdo->prepare('SELECT * FROM user WHERE username = :username and password = SHA2(:password,0)');
					$query->bindValue(':username', $_POST['username']);
					$query->bindValue(':password', $_POST['password']);
					$query->execute();
					if($query->rowCount()>0)
					{
						$row = $query->fetch();
						session_start();
						$_SESSION['isLogin'] = $_POST['username'];
						$_SESSION['idUser'] = $row['id'];
						$_SESSION['type'] = $row['user_type'];
						echo "<script>alert('Login gagal !');</script>";
						header('Location: index/index.php?page=editprofile');
					}else{
						echo "<script>alert('Login gagal !');location.href='?page=login';</script>";
					}
				}
			?>
				<label>Username </label>
				<input class="input-control" type="text" name="username" size="31"/>
				<label>Password </label>
				<input class="input-control" type="password" name="password" size="31"/>
				<input class="btn" type="submit" value="Login" name="login"/>
				belum memiliki akun ? <a href="?page=register">klik</a>
		</div>
</form>