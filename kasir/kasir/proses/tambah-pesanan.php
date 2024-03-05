<?php

include "connect.php";

$id_produk = isset($_POST["produk"]) ? htmlentities($_POST["produk"]) :"";
$jumlah = isset($_POST["jumlah"]) ? htmlentities($_POST["jumlah"]) :"";
$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";

if(!empty($_POST['Tambah_Pesanan_validate'])){
    $result_stok = mysqli_query($conn, "SELECT stok FROM tb_produk WHERE id_produk = '$id_produk'");
    $stok = mysqli_fetch_assoc($result_stok)['stok'];
    if ($stok >= $jumlah) {
        $stok_terbaru = $stok - $jumlah;
        $query_stok = mysqli_query($conn, "UPDATE tb_produk SET stok = '$stok_terbaru' WHERE id_produk = '$id_produk'");
    
        if($query_stok){
        $select = mysqli_query($conn, "SELECT*FROM tb_detailpjl WHERE produk_id = '$id_produk' && penjualan_id = '$kode' ");
        if(mysqli_num_rows($select) > 0){
            echo '<script>alert("Nama Produk Sudah Ada");
            location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
        }else {
            $query = mysqli_query($conn, "INSERT INTO tb_detailpjl (penjualan_id, produk_id, jumlah_produk) VALUES ('$kode', '$id_produk', '$jumlah')");
            if($query){
                echo '<script>alert("Pesanan Berhasil Ditambah");
                location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
            }else {
                echo '<script>alert("Pesanan Gagal Ditambah");
                location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
            }
        }
      }
    } else {
        echo '<script>alert("Stok Tidak Mencukupi");
            location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }
}

?>