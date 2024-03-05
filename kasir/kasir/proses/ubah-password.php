<?php
session_start();
include "connect.php";

$passwordlama = (isset($_POST['passwordlama'])) ? htmlentities($_POST['passwordlama']) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? htmlentities($_POST['passwordbaru']) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? htmlentities($_POST['repasswordbaru']) : "";

if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn, "SELECT*FROM tb_user WHERE username = '$_SESSION[username_kasir]' && password = '$passwordlama' ");
    $hasil = mysqli_fetch_array($query);

    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[username_kasir]'");



            if ($query) {
                $message = '<script>alert("Password berhasil diupdate");
                window.history.back();</script>';

            } else {
                $message = '<script>alert("Password gagal diupdate");
                window.history.back();</script>';
                
            }
        } else {
            $message = '<script>alert("Password Baru tidak sama");
                window.history.back();</script>';
        }
    } else {
        $message = '<script>alert("Password Lama tidak sesuai");
                window.history.back();</script>';
        
    }

} else {
    header('location:../home');
}
echo $message;
?>