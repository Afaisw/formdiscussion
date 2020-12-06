<?php
	require 'adminPermission.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Private</title>
</head>
<body>
	<h1>ini adalah halaman private after login with <u><?php echo $_SESSION['isAdmin']; ?></u></h1>
	<h2><a href="logout.php">Logout</a> <- klik untuk logout</h2>
</body>
</html>

