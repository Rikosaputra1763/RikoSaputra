<?php

include "connect.php";

$nama = isset($_POST["nama"]) ? htmlentities($_POST["nama"]) :"";
$username = isset($_POST["username"]) ? htmlentities($_POST["username"]) :"";
$password = isset($_POST["password"]) ? htmlentities($_POST["password"]) :"";
$level = isset($_POST["level"]) ? htmlentities($_POST["level"]) :"";

if(!empty($_POST['Tambah_user_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Username Telah Ada, Silahkan Masukan Username Yang Berbeda");
        location.href="../admin/user";</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");
        if($query){
            echo '<script>alert("Tambah User Telah Berhasil");
            location.href="../admin/user";</script>';
        }else{
            echo '<script>alert("Gagal Tambah User");
            location.href="../admin/user";</script>';
        }
    }
}

?>