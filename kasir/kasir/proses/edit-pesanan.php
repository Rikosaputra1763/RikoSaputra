<?php

include "connect.php";

$id_detail = isset($_POST['id_detail']) ? htmlentities($_POST['id_detail']) :'';
$id_produk = isset($_POST["produk"]) ? htmlentities($_POST["produk"]) :"";
$jumlah = isset($_POST["jumlah"]) ? htmlentities($_POST["jumlah"]) :"";
$produk = isset($_POST["id_produk"]) ? htmlentities($_POST["id_produk"]) :"";
$stok = isset($_POST["stok"]) ? htmlentities($_POST["stok"]) :"";
$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";

if(!empty($_POST['edit_pesanan_validate'])){
    $select = mysqli_query($conn, "SELECT*FROM tb_detailpjl WHERE produk_id = '$id_produk' && penjualan_id='$kode' && id_detail != '$id_detail' ");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama Produk Sudah Ada");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }else {
        $query_update_stok = mysqli_query($conn, "UPDATE tb_produk SET stok = stok + $stok WHERE id_produk = '$produk'");
        $result_stok = mysqli_query($conn, "SELECT stok FROM tb_produk WHERE id_produk = '$id_produk'");
        $stok = mysqli_fetch_assoc($result_stok)['stok'];
       
        if ($stok >= $jumlah) {
            $stok_terbaru = $stok - $jumlah;
            $query_stok = mysqli_query($conn, "UPDATE tb_produk SET stok = '$stok_terbaru' WHERE id_produk = '$id_produk'");
            if($query_stok){
            $query = mysqli_query($conn, "UPDATE tb_detailpjl SET penjualan_id='$kode', produk_id='$id_produk', jumlah_produk='$jumlah' WHERE id_detail='$id_detail'");
        if($query){
            echo '<script>alert("Pesanan Berhasil Diubah");
            location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }else {
            echo '<script>alert("Pesanan Gagal Diubah");
            location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }
    }
} else {
    echo '<script>alert("Stok Produk Tidak mencukupi");
    location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
}
}
}

?>