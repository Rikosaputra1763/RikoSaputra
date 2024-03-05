<?php

include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) :'';
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) :'';
$alamat = isset( $_POST['alamat']) ? htmlentities($_POST['alamat']) :'';
$nohp = isset( $_POST['nohp']) ? htmlentities($_POST['nohp']) :'';

if(!empty($_POST['Tambah_Pelanggan_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE nama_pelanggan = '$nama'");
    if(mysqli_num_rows($select) > 0){
        echo '<script>alert("Nama Pelanggan sudah ada");
        location.href="../pelanggan";</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pelanggan (id_pelanggan, nama_pelanggan, alamat, no_telepon) VALUES ('$id', '$nama', '$alamat', '$nohp')");
        if($query){
            echo '<script>alert("Berhasil Tambah Pelanggan");
            location.href="../pelanggan";</script>';
        } else {
            echo '<script>alert("Gagal Tambah Pelanggan");
            location.href="../pelanggan";</script>';
        }
    }
}
?>