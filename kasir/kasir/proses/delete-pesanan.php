<?php

include "connect.php";

$id = isset($_POST['id_pesanan']) ? htmlentities($_POST['id_pesanan']) :'';
$id_produk = isset($_POST['id_produk']) ? htmlentities($_POST['id_produk']) :'';
$stok = isset($_POST['jumlah']) ? htmlentities($_POST['jumlah']) :'';
$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";

if(!empty($_POST['delete_pesanan_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_detailpjl WHERE id_detail='$id'");
    if($query){
        $query_update_stok = mysqli_query($conn, "UPDATE tb_produk SET stok = stok + $stok WHERE id_produk = $id_produk");
        echo '<script>alert("Pesanan Berhasil Dihapus");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    } else {
        echo '<script>alert("Pesanan Gagal Dihapus");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }
}

?>