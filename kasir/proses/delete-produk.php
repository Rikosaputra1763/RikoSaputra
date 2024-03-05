<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';

if(!empty($_POST['delete_produk_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk='$id'");
    if($query){
        echo '<script>alert("Produk berhasil dihapus");
        location.href="../admin/produk";</script>';
    }else{
        echo '<script>alert("Produk gagal dihapus");
        location.href="../admin/produk";</script>';
    }
}

?>