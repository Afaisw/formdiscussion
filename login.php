<?php
$errors = array(); //membuat array untuk menyimpan error
if (isset($_POST['login']))
	{
    require 'config/validate.inc'; //import validasi per field
    validateAlfabet($errors, $_POST, 'username'); //memanggil fungsi yang ada di dalma validate.inc
    validateAlfanumerik($errors, $_POST, 'password');
    if ($errors){ //jika ada error
        include 'formlogin.php'; //maka menampilkan formlogin yang diimport
    } else { //jika tidak ada error maka mengeksekusi database
        $query = $db->prepare('SELECT * FROM tb_user WHERE USERNAME = :username and PASSWORD = SHA2(:password,0)'); //sql select
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':password', $_POST['password']);
        $query->execute();
        if($query->rowCount()>0) //seleksi jika ada data yang dipilih
            {
            $row = $query->fetch(); //skrip untuk menampilkan data yang sudah diselect sebelumnya
            session_start(); //inisialisasi session
            $_SESSION['isLogin'] = $_POST['username']; //set session
            $_SESSION['idUser'] = $row['ID_USER'];
            $_SESSION['type'] = $row['USER_TYPE'];
            if($row['USER_TYPE'] == 'expert'){ //kondisi jika user yang sedang login bertype expert
                header('Location: index/index.php?page=all_question'); //akan dialihkan ke halaman yang dituju
            }else{ //selain expert
                header('Location: index/index.php?page=clientallquestion');
            }
        }else{
            echo "<script>alert('Login gagal !');location.href='?page=login';</script>";
        }
    }
}else{
    include 'formlogin.php';
}
?>