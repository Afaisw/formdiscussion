<?php
	session_start();
	if (!isset($_SESSION['isAdmin']))
	{ 
		//user akan diarahkan ke halaman login untuk authorization
		//header("Location: http://localhost/login.php");
		header("Location: http://{$_SERVER['HTTP_HOST']}/paw/Pertemuan6/login.php");
		exit();
	}
?>