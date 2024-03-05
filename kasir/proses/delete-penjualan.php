<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_penjualan_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_penjualan WHERE id_penjualan='$id'");
    if($query){
        echo '<script>alert("Penjualan Berhasil Dihapus");
              location.href="../admin/penjualan";</script>';
    } else {
        echo '<script>alert("Penjualan Gagal Dihapus");
        location.href="../admin/penjualan";</script>';
    }
}

?>