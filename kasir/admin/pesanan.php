<?php

include "../proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah_produk) AS hasilnya FROM tb_detailpjl
LEFT JOIN tb_penjualan ON tb_penjualan.id_penjualan = tb_detailpjl.penjualan_id
LEFT JOIN tb_produk ON tb_produk.id_produk = tb_detailpjl.produk_id
GROUP BY id_detail HAVING tb_detailpjl.penjualan_id = $_GET[idpenjualan]");

$kode = $_GET['idpenjualan'];
$nama = $_GET['namapl'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_produk = mysqli_query($conn, "SELECT id_produk,nama FROM tb_produk")
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header">Pesanan</h5>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-5">
             <div class="form-floating mb-3">
             <input type="number" class="form-control" id="floatingInput" required value="<?php echo $kode ?>" disabled>
             <label for="floatingInput">Id Penjualan</label>
           </div>
       </div>
       <div class="col-lg-5">
             <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingInput" required value="<?php echo $nama ?>" disabled>
             <label for="floatingInput">Nama Pelanggan</label>
           </div>
       </div>


            </div>
            <?php
            if (empty($result)) {
            echo "Data Pesanan tidak ada";
            } else {
            foreach ($result as $row) {
            ?>


            <?php 
            }
            ?>
            <div class="table-responsive" >
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap" >
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $no = 1;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $no++ ?>
                            </th>
                            <td>
                                <?php echo $row['nama'] ?>
                            </td>
                            <td>
                                <?php echo 'Rp ', number_format($row['harga'], 2, ',', '.') ?>
                            </td>
                            <td>
                                <?php echo $row['jumlah_produk'] ?>
                            </td>
                            <td>
                                <?php echo 'Rp ', number_format($row['hasilnya'], 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php 
                    $total += $row['hasilnya'];
                    } 
                    ?>
                    <tr>
                        <td colspan="4" class="fw-bold">
                            Total Harga
                        </td>
                        <td class="fw-semibold" >
                            <?php echo 'Rp ', number_format( $total,2,',', '.') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <?php } ?>
            <div class="column d-flex justify-content-start" >
        <a class="btn btn-dark me-2 fw-semibold" disabled href="./penjualan"><i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
        </div>
    </div>
</div>