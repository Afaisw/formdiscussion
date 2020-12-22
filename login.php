<?php
$errors = array();
if (isset($_POST['login']))
	{
    require 'config/validate.inc';
    validateAlfabet($errors, $_POST, 'username');
    validateAlfanumerik($errors, $_POST, 'password');
    if ($errors){
        include 'formlogin.php';
    } else {
        $query = $db->prepare('SELECT * FROM tb_user WHERE USERNAME = :username and PASSWORD = SHA2(:password,0)');
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':password', $_POST['password']);
        $query->execute();
        if($query->rowCount()>0)
            {
            $row = $query->fetch();
            session_start();
            $_SESSION['isLogin'] = $_POST['username'];
            $_SESSION['idUser'] = $row['ID_USER'];
            $_SESSION['type'] = $row['USER_TYPE'];
            echo "<script>alert('Login gagal !');</script>";
            header('Location: index/index.php?page=editprofile');
        }else{
            echo "<script>alert('Login gagal !');location.href='?page=login';</script>";
        }
    }
}else{
    include 'formlogin.php';
}
?>