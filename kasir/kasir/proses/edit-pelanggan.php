<?php

include "connect.php";

$id = isset($_POST['id_pelanggan']) ? htmlentities($_POST['id_pelanggan']) :'';
$nama = isset($_POST['nama_pelanggan']) ? htmlentities($_POST['nama_pelanggan']) :'';
$alamat = isset($_POST['alamat']) ? htmlentities($_POST['alamat']) :'';
$nohp = isset($_POST['nohp']) ? htmlentities($_POST['nohp']) :'';

if(!empty($_POST['edit_pelanggan_validate'])){
        $select = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE nama_pelanggan='$nama' && id_pelanggan != '$id'");
        if(mysqli_num_rows($select) > 0){
            echo '<script>alert("Nama Pelanggan sudah ada");
            location.href="../pelanggan";</script>';
        }else{
        $query = mysqli_query($conn, "UPDATE tb_pelanggan SET id_pelanggan='$id', nama_pelanggan='$nama', alamat='$alamat', no_telepon='$nohp' WHERE id_pelanggan='$id'");
        if($query){
            echo '<script>alert("Data Pelanggan Berhasil Diubah");
            location.href="../pelanggan";</script>';
        }else {
            echo '<script>alert("Data Pelanggan Gagal Diubah");
            location.href="../pelanggan";</script>';
        }
    }
}

?>