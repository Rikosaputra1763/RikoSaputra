<?php

include "connect.php";

$id = isset($_POST['id_produk']) ? htmlentities($_POST['id_produk']) :'';
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) :'';
$satuan = isset($_POST['satuan']) ? htmlentities($_POST['satuan']) :'';
$harga = isset($_POST['harga']) ? htmlentities($_POST['harga']) : '';
$stok = isset($_POST['stok']) ? htmlentities($_POST['stok']) : '';

if(!empty($_POST['Tambah_Produk_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_produk where nama='$nama'");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama produk sudah ada");
        location.href="../admin/produk";</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_produk (id_produk, nama, satuan, harga, stok) VALUES ('$id', '$nama', '$satuan', '$harga', '$stok')");
        if($query){
            echo '<script>alert("Tambah produk berhasil");
            location.href="../admin/produk";</script>';
        }else{
            echo '<script>alert("Tambah produk gagal");
            location.href="../admin/produk";</script>';
        }
    }
}

?>