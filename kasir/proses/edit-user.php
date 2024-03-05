<?php

include "connect.php";

$id_user = isset($_POST['id']) ? htmlentities($_POST['id']) :'';
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) :'';
$username = isset($_POST['username']) ? htmlentities($_POST['username']) :'';
$level = isset($_POST['level']) ? htmlentities($_POST['level']) :'';

if(!empty($_POST['edit_user_validate'])){
        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama', username='$username', level='$level' WHERE id_user = '$id_user'");
        if($query){
            echo '<script>alert("Berhasil Edit User");
            location.href="../admin/user";</script>';
        }else{
            echo '<script>alert("Gagal Edit User");
            location.href="../admin/user";</script>';
    }
}

?>