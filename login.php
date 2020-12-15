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
				<input class="input-control" type="text" name="username" placeholder="Username" /><br>
				<input class="input-control" type="password" name="password" placeholder="Password" /><br>
				belum memiliki akun ? <a href="?page=register">klik</a><br>
				<input class="btn" type="submit" value="Login" name="login"/>
				
		</div>
</form>