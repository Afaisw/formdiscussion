<form action="?page=login" method="POST">
	<div class="login">
		<h2>Login</h2>
				<input class="input-control" type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['username'])?>" /><br>
				<?php if(isset($_POST['login'])) echo $errors['username']?>
				<input class="input-control" type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['submit'])) echo htmlspecialchars($_POST['password'])?>" /><br>
				<?php if(isset($_POST['login'])) echo $errors['password']?>
				belum memiliki akun ? <a href="?page=register">klik</a><br>
				<input class="btn" type="submit" value="Login" name="login"/>		
		</div>
</form>