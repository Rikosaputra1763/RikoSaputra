<?php

include "connect.php";

$id_detail = isset($_POST['id_detail']) ? htmlentities($_POST['id_detail']) :'';
$id_produk = isset($_POST["produk"]) ? htmlentities($_POST["produk"]) :"";
$jumlah = isset($_POST["jumlah"]) ? htmlentities($_POST["jumlah"]) :"";
$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";

if(!empty($_POST['edit_pesanan_validate'])){
    $select = mysqli_query($conn, "SELECT*FROM tb_detailpjl WHERE produk_id = '$id_produk' && id_detail !='$id_detail' ");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama Produk Sudah Ada");
        location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }else {
        $query = mysqli_query($conn, "UPDATE tb_detailpjl SET penjualan_id='$kode', produk_id='$id_produk', jumlah_produk='$jumlah' WHERE id_detail='$id_detail'");
        if($query){
            echo '<script>alert("Pesanan Berhasil Diubah");
            location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }else {
            echo '<script>alert("Pesanan Gagal Diubah");
            location.href="../admin/?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }
    }
}

?>