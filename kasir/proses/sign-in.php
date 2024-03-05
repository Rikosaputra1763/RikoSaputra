<?php
session_start();
include "connect.php";

$username = isset($_POST['username']) ? htmlentities($_POST['username']) :'';
$password = isset($_POST['password']) ? htmlentities($_POST['password']) :'';

if(!empty($_POST['submit'])){
    $query = mysqli_query($conn, "SELECT*FROM tb_user WHERE username='$username' && password = '$password'");

    if(mysqli_num_rows($query) > 0){
        $hasil = mysqli_fetch_array($query);
        if($hasil["level"] == "admin"){
        $_SESSION["username_admin"] = $username;
        $_SESSION["level_admin"] = $hasil['level'];
        $_SESSION["nama_admin"] = $hasil['nama'];
        $_SESSION['id_admin'] = $hasil['id_user'];
            header('location:../admin/index.php');
        }elseif($hasil['level'] == "kasir"){
            $_SESSION["username_kasir"] = $username;
            $_SESSION["level_kasir"] = $hasil['level'];
            $_SESSION["nama_kasir"] = $hasil['nama'];
            $_SESSION['id_kasir'] = $hasil['id_user'];
            header('location:../kasir/index.php');
        }
    }else{
        echo '<script>alert("Username atau Password anda Salah ");
        location.href="../login.php";</script>';
    }
} else {
    echo '<script>alert("Login Gagal");
    location.href="../login.php";</script>';
}

?>