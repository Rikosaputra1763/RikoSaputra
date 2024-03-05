<?php

include "../proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah_produk) AS harganya FROM tb_penjualan 
LEFT JOIN tb_pelanggan ON tb_pelanggan.id_pelanggan = tb_penjualan.pelanggan_id
LEFT JOIN tb_detailpjl ON tb_detailpjl.penjualan_id = tb_penjualan.id_penjualan 
LEFT JOIN tb_produk ON tb_produk.id_produk = tb_detailpjl.produk_id
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_penjualan.id_penjualan
GROUP BY id_penjualan ORDER BY id_bayar ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM tb_pelanggan");
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header bg-info">Penjualan</h5>
        <div class="card-body">
            <div class="row">
                <div class="column d-flex justify-content-start">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahpelanggan"> Tambah
                        Penjualan</button>
                </div>
            </div>
            <!-- modal tambah -->
            <div class="modal fade" id="tambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="proses/tambah-penjualan.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Rafli" name="id_penjualan" required
                                                value="<?php echo rand(1000, 9999) ?>" required>
                                            <label for="floatingInput">Id Penjualan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Id Penjualan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                value="<?php echo date('Y-m-H') ?>" placeholder="name@example.com"
                                                name="tanggal" required>
                                            <label for="floatingInput">Tanggal Penjualan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Tanggal Penjualan
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="id_pelanggan" required>
                                                <option selected hidden value="">Pilih Nama Pelanggan</option>
                                                <?php
                                                foreach ($select_pelanggan as $value) {
                                                    echo '<option value="' . $value['id_pelanggan'] . '">' . $value['nama_pelanggan'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingPassword">Nama Pelanggan</label>
                                            <div class="invalid-feedback text-start">
                                                Pilih Nama Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Tambah_Penjualan_validate"
                                        value="1234">Tambah Penjualan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <?php
            if (empty($result)) {
                echo "Data Penjualan tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- modal edit -->
                    <div class="modal fade" id="edit<?php echo $row['id_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penjualan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="text-center needs-validation" novalidate action="proses/edit-penjualan.php"
                                        method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_penjualan'] ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Rafli" name="id_penjualan" required
                                                        value="<?php echo $row['id_penjualan'] ?>" required>
                                                    <label for="floatingInput">Id Penjualan</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Id Penjualan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com" name="tanggal"
                                                        value="<?php echo $row['tanggal_penjualan'] ?>" required>
                                                    <label for="floatingInput">Tanggal Penjualan</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Tanggal Penjualan
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="id_pelanggan" required>
                                                        <option selected hidden value="">Pilih Nama Pelanggan</option>
                                                        <?php
                                                        foreach ($select_pelanggan as $value) {
                                                            if ($row['pelanggan_id'] == $value['id_pelanggan']) {
                                                                echo '<option selected value="' . $value['id_pelanggan'] . '">' . $value['nama_pelanggan'] . '</option>';
                                                            } else {
                                                                echo '<option value="' . $value['id_pelanggan'] . '">' . $value['nama_pelanggan'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingPassword">Nama Pelanggan</label>
                                                    <div class="invalid-feedback text-start">
                                                        Pilih Nama Pelanggan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_penjualan_validate"
                                                value="1234">Save Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->

                    <!-- modal hapus -->
                    <div class="modal fade" id="delete<?php echo $row['id_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Penjualan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="text-center needs-validation" novalidate action="proses/delete-penjualan.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_penjualan'] ?>" name="id">
                                        <div class="col-lg-12">
                                            Apakah Anda Yakin Ingin Menghapus Data Penjualan Dengan Id <b>
                                                <?php echo $row['id_penjualan'] ?>
                                            </b> Dan nama pelanggan <b>
                                                <?php echo $row['nama_pelanggan'] ?>
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_penjualan_validate"
                                                value="1234">Delete</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal hapus -->

                <?php
                }
                ?>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-nowrap" >
                                <th scope="col">No</th>
                                <th scope="col">Id Penjualan</th>
                                <th scope="col">Tanggal Penjualan</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Aksi</th>
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
                                        <?php echo $row['id_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tanggal_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo 'Rp ', number_format($row['harganya'], 2, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>Dibayar</span>" : ""; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_pelanggan'] ?>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-info btn-sm me-1"
                                            href="./?x=pesanan&idpenjualan=<?php echo $row['id_penjualan'] . "&namapl=" . $row['nama_pelanggan'] ?>"><i
                                                class="bi bi-cart-plus"></i></a>
                                        <button
                                            class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-warning'; ?> btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id_penjualan'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button
                                            class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-danger'; ?> btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id_penjualan'] ?>"><i
                                                class="bi bi-trash"></i></button>
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

