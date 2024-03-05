<?php

include "../proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header bg-info">Produk</h5>
        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data Produk tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                <?php
                }
                ?>
                <div class="table-responsive">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Id Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Satuan Produk</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no++ ?>
                                </th>
                                <td>
                                    <?php echo $row['id_produk'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $row['satuan'] ?>
                                </td>
                                <td>
                                    <?php echo 'Rp. ', number_format($row['harga'], 2, ',', '.') ?>
                                </td>
                                <td>
                                    <?php echo $row['stok'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>