<?php
session_start();
unset($_SESSION['isAdmin']);
header("Location: http://{$_SERVER['HTTP_HOST']}/paw/Pertemuan6/home.php");
?>