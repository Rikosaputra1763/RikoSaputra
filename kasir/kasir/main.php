<?php

if(isset($_GET['x']) && $_GET['x']=="pesanan"){
    include "pesanan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="penjualan"){
    include "penjualan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="pelanggan"){
    include "pelanggan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="produk" || !isset($_GET['x'])){
    include "produk.php";
}
?>