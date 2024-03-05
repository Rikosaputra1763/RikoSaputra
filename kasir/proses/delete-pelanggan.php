<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_pelanggan_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");
    if($query){
        echo '<script>alert("Data Pelanggan Berhasil Dihapus");
              location.href="../admin/pelanggan";</script>';
    } else {
        echo '<script>alert("Data Pelanggan Gagal Dihapus");
        location.href="../admin/pelanggan";</script>';
    }
}

?>