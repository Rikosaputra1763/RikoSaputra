<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_pelanggan_validate'])){
    $select = mysqli_query($conn, "SELECT pelanggan_id FROM tb_penjualan WHERE pelanggan_id='$id'");

    if(mysqli_num_rows($select)> 0){
        echo '<script>alert("Pelanggan Telah memiliki riwayat penjualan, data tidak bisa dihapus");location.href="../pelanggan";</script>';
    }else{
    $query = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");
    if($query){
        echo '<script>alert("Data Pelanggan Berhasil Dihapus");
              location.href="../pelanggan";</script>';
    } else {
        echo '<script>alert("Data Pelanggan Gagal Dihapus");
        location.href="../pelanggan";</script>';
    }
}
}
?>