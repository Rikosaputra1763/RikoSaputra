<?php

include "connect.php";

$id = isset($_POST['id_produk']) ? htmlentities($_POST['id_produk']) :'';
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) :'';
$satuan = isset($_POST['satuan']) ? htmlentities($_POST['satuan']) :'';
$harga = isset($_POST['harga']) ? htmlentities($_POST['harga']) :'';
$stok = isset($_POST['stok']) ? htmlentities($_POST['stok']) :'';

if(!empty($_POST['edit_produk_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama='$nama' && id_produk != '$id'");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama produk sudah ada");
        location.href="../admin/produk";</script>';
    }else {
        $query = mysqli_query($conn, "UPDATE tb_produk SET id_produk='$id', nama='$nama', satuan='$satuan', harga='$harga', stok='$stok' WHERE id_produk='$id'");
        if($query){
            echo '<script>alert("Edit produk telah berhasil");
            location.href="../admin/produk";</script>';
        }else {
            echo '<script>alert("Edit produk gagal");
            location.href="../admin/produk";</script>';
        }
    }
}

?>