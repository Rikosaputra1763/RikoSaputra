<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_penjualan_validate'])){
    $select = mysqli_query($conn, "SELECT penjualan_id FROM tb_detailpjl WHERE penjualan_id='$id'");

    if(mysqli_num_rows($select)> 0){
        echo '<script>alert("Penjualan Telah memiliki Pesanan, data tidak bisa dihapus");location.href="../penjualan";</script>';
    }else{
    $query = mysqli_query($conn, "DELETE FROM tb_penjualan WHERE id_penjualan='$id'");
    if($query){
        echo '<script>alert("Penjualan Berhasil Dihapus");
              location.href="../penjualan";</script>';
    } else {
        echo '<script>alert("Penjualan Gagal Dihapus");
        location.href="../penjualan";</script>';
    }
}
}

?>