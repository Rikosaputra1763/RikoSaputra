<?php

include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header bg-info">Pelanggan</h5>
        <div class="card-body">
            <div class="row">
                <div class="column d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahpelanggan"> Tambah
                        Pelanggan</button>
                </div>
            </div>
            <!-- modal tambah -->
            <div class="modal fade" id="tambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="proses/tambah-pelanggan.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Rafli" name="id" required value="<?php echo rand(1000, 9999) ?>">
                                            <label for="floatingInput">Id Pelanggan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Id Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  placeholder="name@example.com" name="nama" required>
                                            <label for="floatingInput">Nama Pelanggan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Nama Pelanggan 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="password" name="nohp" required>
                                            <label for="floatingPassword">No Hp</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan No Hp Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                        <textarea class="form-control" name="alamat" id="" style="height: 100px;"></textarea>
                                            <label for="floatingInput">Alamat</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Alamat Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Tambah_Pelanggan_validate"
                                        value="1234">Tambah Pelanggan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <?php
            if (empty($result)) {
            echo "Data Pelanggan tidak ada";
            } else {
            foreach ($result as $row) {
            ?>

            <!-- modal edit -->
            <div class="modal fade" id="edit<?php echo $row['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="proses/edit-pelanggan.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Rafli" name="id_pelanggan" required value="<?php echo $row['id_pelanggan'] ?>">
                                            <label for="floatingInput">Id Pelanggan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Id Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  placeholder="name@example.com" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan'] ?>" required>
                                            <label for="floatingInput">Nama Pelanggan</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Nama Pelanggan 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="password" name="nohp" value="<?php echo $row['no_telepon'] ?>" required>
                                            <label for="floatingPassword">No Hp</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan No Hp Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                        <textarea class="form-control" name="alamat" id="" style="height: 50px;"><?php echo $row['alamat'] ?></textarea>
                                            <label for="floatingInput">Alamat</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Alamat Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_pelanggan_validate"
                                        value="1234">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal edit -->

            <!-- modal hapus -->
            <div class="modal fade" id="delete<?php echo $row['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="text-center needs-validation" novalidate action="proses/delete-pelanggan.php" method="POST">
                  <input type="hidden" value="<?php echo $row['id_pelanggan'] ?>" name="id">
                  <div class="col-lg-12">
                    Apakah Anda Yakin Ingin Menghapus Data Pelanggan Dengan Nama <b><?php echo $row['nama_pelanggan'] ?></b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="delete_pelanggan_validate" value="1234">Delete</button>
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
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-nowrap" >
                        <th scope="col">No</th>
                        <th scope="col">Id Pelanggan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
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
                                <?php echo $row['id_pelanggan'] ?>
                            </td>
                            <td>
                                <?php echo $row['nama_pelanggan'] ?>
                            </td>
                            <td>
                                <?php echo $row['alamat'] ?>
                            </td>
                            <td>
                                <?php echo $row['no_telepon'] ?>
                            </td>
                           <td class="d-flex">
                             <!--   <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#info<?php echo $row['id_pelanggan'] ?>"><i class="bi bi-info-square"></i></button> -->
                                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id_pelanggan'] ?>"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id_pelanggan'] ?>"><i class="bi bi-trash"></i></button>
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