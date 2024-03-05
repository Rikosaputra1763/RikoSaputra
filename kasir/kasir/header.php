<?php
include("proses/connect.php");
$query = mysqli_query($conn,"SELECT*FROM tb_user WHERE username='$_SESSION[username_kasir]'");
$record = mysqli_fetch_array($query);

?>

<nav class="navbar navbar-expand border-bottom border-body bg-info sticky-top" data-bs-theme="info">
        <div class="container-lg">
            <a class="navbar-brand" href="."><i class="bi bi-window"></i> Graha Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['nama_kasir'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profile"><i class="bi bi-person-fill-gear"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="./" data-bs-toggle="modal" data-bs-target="#password" ><i class="bi bi-key"></i> Password</a></li>
                            <li><a class="dropdown-item" href="../proses/logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <!-- modal ubah password-->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="text-center needs-validation" novalidate action="proses/ubah-password.php" method="POST">
                  
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Rafli21" name="username"
                          value="<?php echo $_SESSION['username_kasir'] ?>" disabled>
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback text-start">
                          Masukan username anda
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword"  name="passwordlama"
                          value="" required>
                        <label for="floatingInput">Password Lama</label>
                        <div class="invalid-feedback text-start">
                          Masukan Password Lama anda
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="passwordbaru"
                          value="" required >
                        <label for="floatingInput">Password Baru</label>
                        <div class="invalid-feedback text-start">
                          Masukan Password Baru
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword"  name="repasswordbaru"
                          value="" required >
                        <label for="floatingInput">Ulangi Password Baru Anda</label>
                        <div class="invalid-feedback text-start">
                          Masukan lagi Password Baru anda
                        </div>
                      </div>
                    </div>                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="1234">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- end modal ubah password-->

                        <!-- modal edit profile-->
                        <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="text-center needs-validation" novalidate action="proses/ubah-profile.php" method="POST">
                  <input type="hidden" value="" name="id">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Rafli21" name="username"
                          value="<?php echo $_SESSION['username_kasir'] ?>" required>
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback text-start">
                          Masukan username anda
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Rafli" name="nama"
                         value="<?php echo $record['nama'] ?>" required>
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback text-start">
                          Masukan nama anda
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="profile_validate" value="1234">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- end modal edit profile-->