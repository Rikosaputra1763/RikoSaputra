<?php

if(isset($_GET['x']) && $_GET['x']=="home" || !isset($_GET['x'])){
    include "home.php";
}elseif(isset($_GET['x']) && $_GET['x']=="produk"){
    include "produk.php";
}elseif(isset($_GET['x']) && $_GET['x']=="pelanggan"){
    include "pelanggan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="penjualan"){
    include "penjualan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="user"){
    include "user.php";
}elseif(isset($_GET['x']) && $_GET['x']=="pesanan"){
    include "pesanan.php";
}elseif(isset($_GET['x']) && $_GET['x']=="perbulan"){
    include "perbulan.php";
}
?>