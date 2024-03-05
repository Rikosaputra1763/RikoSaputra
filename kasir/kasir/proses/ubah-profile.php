<?php
session_start();
include "connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";

if (!empty($_POST['profile_validate'])) {
            $query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama' WHERE username = '$_SESSION[username_kasir]'");

            if ($query) {
                $message = '<script>alert("Edit Profile berhasil");
                window.history.back()</script>';

            } else {
                $message = '<script>alert("Edit Profile gagal");
                window.history.back()</script>';
                
            }
        } 
echo $message;
?>