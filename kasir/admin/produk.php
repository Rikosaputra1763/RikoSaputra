<?php

include "../proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header bg-info text-light">Produk</h5>
        <div class="card-body">
            <div class="row">
                <div class="column d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahpelanggan"> Tambah
                        Produk</button>
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
                            <form class="text-center needs-validation" novalidate action="../proses/tambah-produk.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Rafli" name="id_produk" required
                                                value="<?php echo rand(1000, 9999) ?>" required>
                                            <label for="floatingInput">Id Produk</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Id Produk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="nama" required>
                                            <label for="floatingInput">Nama Produk</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Nama Produk
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="password" name="satuan" required>
                                            <label for="floatingPassword">Satuan Produk</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Satuan Produk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="password" name="harga" required>
                                            <label for="floatingPassword">Harga Satuan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Harga Satuan Produk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="password" name="stok" required>
                                            <label for="floatingPassword">Stok</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Stok Produk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Tambah_Produk_validate"
                                        value="1234">Tambah Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <?php
            if (empty($result)) {
                echo "PRODUK TIDAK ADA";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- modal edit -->
                    <div class="modal fade" id="edit<?php echo $row['id_produk'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="text-center needs-validation" novalidate action="../proses/edit-produk.php"
                                        method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Rafli" name="id_produk" required
                                                        value="<?php echo $row['id_produk'] ?>" required>
                                                    <label for="floatingInput">Id Produk</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Id Produk
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com" name="nama"
                                                        value="<?php echo $row['nama'] ?>" required>
                                                    <label for="floatingInput">Nama Produk</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Nama Produk
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                        <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="password" name="satuan" value="<?php echo $row['satuan'] ?>"
                                                        required>
                                                    <label for="floatingPassword">Satuan Produk</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Satuan Produk
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="password" name="harga" value="<?php echo $row['harga'] ?>"
                                                        required>
                                                    <label for="floatingPassword">Harga Satuan</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Harga Satuan Produk
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="password" name="stok" value="<?php echo $row['stok'] ?>"
                                                        required>
                                                    <label for="floatingPassword">Stok</label>
                                                    <div class="invalid-feedback text-start">
                                                        Masukan Stok Produk
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_produk_validate"
                                                value="1234">Save Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->

                    <!-- modal hapus -->
                    <div class="modal fade" id="delete<?php echo $row['id_produk'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="text-center needs-validation" novalidate action="../proses/delete-produk.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_produk'] ?>" name="id">
                                        <div class="col-lg-12">
                                            Apakah Anda Yakin Ingin Menghapus Produk Dengan Nama <b>
                                                <?php echo $row['nama'] ?>
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_produk_validate"
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
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap" >
                            <th scope="col">No</th>
                            <th scope="col">Id Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Satuan Produk</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Stok</th>
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
                                <td class="d-flex">
                                    <!--   <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#info<?php echo $row['id_produk'] ?>"><i class="bi bi-info-square"></i></button> -->
                                    <button class="btn btn-success btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#edit<?php echo $row['id_produk'] ?>"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete<?php echo $row['id_produk'] ?>"><i
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