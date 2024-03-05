<?php

include "../proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <h5 class="card-header bg-info text-light">User</h5>
        <div class="card-body">
            <div class="row">
                <div class="column d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahuser"> Tambah
                        User</button>
                </div>
            </div>
            <!-- modal tambah -->
            <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="../proses/tambah-user.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Riko" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Nama User
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  placeholder="nama" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Username 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level"
                                                required>
                                                <option selected value="" hidden>Level</option>
                                                <option value="admin">Admin</option>
                                                <option value="kasir">Kasir</option>
                                            </select>
                                            <label for="floatingInput">Level</label>
                                            <div class="invalid-feedback text-start">
                                                Pilih Level User
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="Password" class="form-control" id="floatingInput"
                                                placeholder="password" value="1234" name="password" required>
                                            <label for="floatingPassword">Password</label>
                                            <div class="valid-feedback text-start">
                                                Password User Sudah Terisi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Tambah_user_validate"
                                        value="1234">Tambah User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <?php
            foreach ($result as $row) {
            ?>
            <!-- modal view -->
            <div class="modal fade" id="info<?php echo $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">View User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action=""
                                method="POST">
                                <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Riko" name="id_user" value="<?php echo $row['id_user'] ?>" disabled>
                                            <label for="floatingInput">Id User</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Riko" name="nama" value="<?php echo $row['nama'] ?>" disabled>
                                            <label for="floatingInput">Nama</label>
                                        </div>
                                    </div>

                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  placeholder="nama" name="username" value="<?php echo $row['username'] ?>" disabled>
                                            <label for="floatingInput">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level" disabled>
                                                <option selected value="" hidden><?php 
                                                        if($row['level']=="admin"){
                                                            echo "Admin";
                                                        }elseif($row["level"]== "kasir"){
                                                            echo "Kasir";
                                                        }else{
                                                            echo "Tidak Dapat Access";
                                                        }
                                                ?></option>
                                                <option value="admin">Admin</option>
                                                <option value="kasir">Kasir</option>
                                            </select>
                                            <label for="floatingInput">Level</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal view -->

            <!-- modal edit -->
            <div class="modal fade" id="edit<?php echo $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="../proses/edit-user.php"
                                method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_user'] ?>">
                                <div class="row">
                                <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Riko" value="<?php echo $row['id_user'] ?>" disabled>
                                            <label for="floatingInput">Id User</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Riko" name="nama" value="<?php echo $row['nama'] ?>" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Nama User
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  placeholder="nama" name="username" value="<?php echo $row['username'] ?>" required >
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Username 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level"
                                                required>
                                                        <?php
                                                            $data= array("admin", "kasir");
                                                            foreach ($data as $value) {
                                                                if($row['level'] == $value){
                                                                    echo "<option selected value=". $value .">$value</option>";
                                                                } else {
                                                                    echo "<option value=". $value .">$value</option>";
                                                                }
                                                            }
                                                        ?>
                                            </select>
                                            <label for="floatingInput">Level</label>
                                            <div class="invalid-feedback text-start">
                                                Pilih Level User
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_user_validate"
                                        value="1234">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal edit -->

            <!-- modal hapus -->
            <div class="modal fade" id="delete<?php echo $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="text-center needs-validation" novalidate action="../proses/delete-user.php" method="POST">
                  <input type="hidden" value="<?php echo $row['id_user'] ?>" name="id">
                  <div class="col-lg-12">
                    <?php 
                      if($row['username'] == $_SESSION['username_admin']) {
                        echo "<b>Anda tidak dapat menghapus akun sendiri</b>";
                      } else {
                        echo "Apakah anda ingin menghapus user <b>$row[username]</b>";
                      }
                    ?>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn <?php echo ($row['username'] == $_SESSION['username_admin']) ? 'btn-secondary' : 'btn-danger' ;?>" name="delete_user_validate" value="1234" <?php echo ($row['username'] == $_SESSION['username_admin']) ? 'disabled btn-secondary' : '' ;?>>Delete</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
            <!-- end modal hapus -->

            <?php 
            }
            if (empty($result)) {
                echo "Data user tidak ada";
              } else {
            ?>
            <div class="table-responsive" >
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap" >
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
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
                                <?php echo $row['nama'] ?>
                            </td>
                            <td>
                                <?php echo $row['username'] ?>
                            </td>
                            <td>
                                <?php echo $row['level'] ?>
                            </td>
                            <td class="d-flex">
                                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#info<?php echo $row['id_user'] ?>"><i class="bi bi-info-square"></i></button>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id_user'] ?>"><i class="bi bi-pencil-square"></i></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id_user'] ?>"><i class="bi bi-trash"></i></button>
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