<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user='$id'");
    if($query){
        echo '<script>alert("User berhasil dihapus");
        location.href="../admin/user";</script>';
    }else{
        echo '<script>alert("User gagal dihapus");
        location.href="../admin/user";</script>';
    }
}

?>