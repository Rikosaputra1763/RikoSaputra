<?php

include "connect.php";

$id_produk = isset($_POST["produk"]) ? htmlentities($_POST["produk"]) :"";
$jumlah = isset($_POST["jumlah"]) ? htmlentities($_POST["jumlah"]) :"";
$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";

if(!empty($_POST['Tambah_Pesanan_validate'])){
    $select = mysqli_query($conn, "SELECT*FROM tb_detailpjl WHERE produk_id = '$id_produk' && penjualan_id = '$kode' ");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama Produk Sudah Ada");
        location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }else {
        $query = mysqli_query($conn, "INSERT INTO tb_detailpjl (penjualan_id, produk_id, jumlah_produk) VALUES ('$kode', '$id_produk', '$jumlah')");
        if($query){
            echo '<script>alert("Pesanan Berhasil Ditambah");
            location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }else {
            echo '<script>alert("Pesanan Gagal Ditambah");
            location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }
    }
}

?>