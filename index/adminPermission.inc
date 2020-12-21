<?php
	session_start();
	/* error_reporting(0); */
	if (!isset($_SESSION['isLogin']))
	{ 
		//user akan diarahkan ke halaman login untuk authorization
		//header("Location: http://localhost/login.php");
		header("Location: ../index.php?page=login");
		exit();
	}
?>