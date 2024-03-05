<?php

include "connect.php";
$id = isset($_POST['id']);
$idpenjualan = isset($_POST['id_penjualan']) ? htmlentities($_POST['id_penjualan']) :'';
$idpelanggan = isset($_POST['id_pelanggan']) ? htmlentities($_POST['id_pelanggan']) :'';
$tanggal = isset($_POST['tanggal']) ? htmlentities($_POST['tanggal']) : '';

if(!empty($_POST['edit_penjualan_validate'])){
   $query = mysqli_query($conn, "UPDATE tb_penjualan SET pelanggan_id='$idpelanggan', id_penjualan='$idpenjualan', tanggal_penjualan='$tanggal' WHERE id_penjualan='$id'");
   if($query){
    echo '<script>alert("Berhasil Edit Penjualan");
    location.href="../admin/penjualan";</script>';
   } else {
    echo '<script>alert("Gagal Edit Penjualan");
    location.href="../admin/penjualan";</script>';
   }
}


?>