<?php
	if (isset($_POST['login']))
	{
		include 'checkPassword.inc';
		if (checkPassword($_POST['username'], $_POST['password']))
			session_start();
			$_SESSION['isAdmin'] = $_POST['username'];
			header('Location: http://localhost/paw/Pertemuan6/Private.php');
			exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<fieldset>
	<h2>Login</h2>
	<fieldset>
		<form action="login.php" method="POST">
		<table>
			<tr>
				<td><label for="username">Username </label></td>
				<td><input type="text" name="username" size="31"/></td>
			</tr>
			<tr>
				<td><label for="password">Password </label></td>
				<td><input type="text" name="password" size="31"/></td>
			</tr>
			<tr>
				<td><label>&nbsp;</label></td>
				<td><input type="submit" value="Login" name="login"/>
			</tr>
		</table>
		</form>
	</fieldset>
	</fieldset>
</body>
</html>