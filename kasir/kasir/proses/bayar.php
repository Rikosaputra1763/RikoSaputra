<?php
include "connect.php";

session_start();

$kode = isset($_POST["id"]) ? htmlentities($_POST["id"]) :"";
$nama = isset($_POST["namapl"]) ? htmlentities($_POST["namapl"]) :"";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembalian =  $uang - $total;

if(!empty($_POST['bayar_validate'])){
    if($kembalian<0){
        echo '<script>alert("Nominal Uang tidak mencukupi");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO tb_bayar (id_bayar, nominal_uang, total_bayar) VALUES ('$kode', '$uang', '$total')");
    if(!$query){
        echo '<script>alert("Maaf Pembayaran Anda Gagal");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    } else{
        echo '<script>alert("Selamat Pembayaran Anda Berhasil \nUang Kembalian Anda Rp. '.$kembalian.'");
        location.href="../?x=pesanan&idpenjualan='.$kode.'&namapl='.$nama.'";</script>';
    }
}
}

?>