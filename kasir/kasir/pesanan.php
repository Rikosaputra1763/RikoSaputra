<?php

include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, tb_produk.id_produk, SUM(harga*jumlah_produk) AS hasilnya FROM tb_detailpjl
LEFT JOIN tb_penjualan ON tb_penjualan.id_penjualan = tb_detailpjl.penjualan_id
LEFT JOIN tb_produk ON tb_produk.id_produk = tb_detailpjl.produk_id
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_penjualan.id_penjualan
GROUP BY id_detail HAVING tb_detailpjl.penjualan_id = $_GET[idpenjualan]");

$kode = $_GET['idpenjualan'];
$nama = $_GET['namapl'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_produk = mysqli_query($conn, "SELECT id_produk,nama FROM tb_produk");
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
            <!-- modal tambah -->
            <div class="modal fade" id="tambahpesanan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="proses/tambah-pesanan.php"
                                method="POST">
                                <input type="hidden" name="id" value="<?php echo $kode ?>">
                                <input type="hidden" name="namapl" value="<?php echo $nama ?>" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="produk" required>
                                            <option selected hidden value="">Pilih Nama Produk</option>
                                                    <?php
                                                        foreach($select_produk as $value){
                                                            echo '<option value="'.$value['id_produk'].'">'.$value['nama'].'</option>';
                                                        }
                                                    ?>
                                        </select>
                                            <label for="floatingInput">Produk</label>
                                            <div class="invalid-feedback text-start">
                                                Pilin Nama Produk Produk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" value=""  placeholder="name@example.com" name="jumlah" required>
                                            <label for="floatingInput">Jumlah</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Jumlah 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Tambah_Pesanan_validate"
                                        value="1234">Tambah Pesanan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <?php
                            if (empty($result)) {
                                echo "Data Pesanan tidak ada";
                            } else {
            foreach ($result as $row) {
            ?>
           
            <!-- modal edit -->
            <div class="modal fade" id="edit<?php echo $row['id_detail'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penjualan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center needs-validation" novalidate action="proses/edit-pesanan.php"
                                method="POST">
                                <input type="hidden" name="id_detail" value="<?php echo $row['id_detail'] ?>" >
                                <input type="hidden" name="id_produk" value="<?php echo $row['id_produk'] ?>" >
                                <input type="hidden" name="stok" value="<?php echo $row['jumlah_produk'] ?>">
                                <input type="hidden" name="id" value="<?php echo $kode ?>">
                                <input type="hidden" name="namapl" value="<?php echo $nama ?>" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="produk" required>
                                            <option selected hidden value="">Pilih Nama Produk</option>
                                                    <?php
                                                        foreach($select_produk as $value){
                                                            if($row['produk_id']==$value['id_produk']){
                                                                echo '<option selected value="'.$value['id_produk'].'">'.$value['nama'].'</option>';
                                                            }else{
                                                            echo '<option value="'.$value['id_produk'].'">'.$value['nama'].'</option>';
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                            <label for="floatingInput">Produk</label>
                                            <div class="invalid-feedback text-start">
                                                Pilin Nama Produk Produk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" value="<?php echo $row['jumlah_produk'] ?>"  placeholder="name@example.com" name="jumlah" required>
                                            <label for="floatingInput">Jumlah</label>
                                            <div class="invalid-feedback text-start">
                                                Masukan Jumlah 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_pesanan_validate"
                                        value="1234">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal edit -->

            <!-- modal hapus -->
            <div class="modal fade" id="delete<?php echo $row['id_detail'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="text-center needs-validation" novalidate action="proses/delete-pesanan.php" method="POST">
                  <input type="hidden" value="<?php echo $row['id_detail'] ?>" name="id_pesanan">
                  <input type="hidden" value="<?php echo $row['id_produk'] ?>" name="id_produk" >
                  <input type="hidden" value="<?php echo $row['jumlah_produk'] ?>" name="jumlah" >
                  <input type="hidden" name="id" value="<?php echo $kode ?>">
                  <input type="hidden" name="namapl" value="<?php echo $nama ?>" >
                  <div class="col-lg-12">
                    Apakah Anda Yakin Ingin Menghapus Data Pesanan Dengan nama produk <b><?php echo $row['nama'] ?></b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="delete_pesanan_validate" value="1234">Delete</button>
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

<!-- modal Bayar-->
<div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
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
        <span class="fw-semibold fs-5">Apakah Anda Ingin Melakukan Pembayaran??</span>
              <form class="text-center needs-validation" novalidate action="proses/bayar.php"
                method="POST">
                <input type="hidden" name="id" value="<?php echo $kode ?>">
                <input type="hidden" name="namapl" value="<?php echo $nama ?>" >
                <input type="hidden" name="total" value="<?php echo $total ?>">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3 mt-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="jumlah" name="uang"
                        required>
                      <label for="floatingInput">Nominal Uang</label>
                      <div class="invalid-feedback text-start">
                        Masukan Nominal Uang
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success " name="bayar_validate"
                    value="1234">Bayar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- end modal Bayar-->

      <?php

      ?>
            <div class="table-responsive" >
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-nowrap" >
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Satuan Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['nama'] ?>
                            </td>
                            <td>
                                <?php echo $row['satuan'] ?>
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
                           <td class="d-flex">
                                <button class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-warning'; ?> btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id_detail'] ?>"><i class="bi bi-pencil-square"></i></button>
                                <button class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-danger'; ?> btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id_detail'] ?>"><i class="bi bi-trash"></i></button>
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
        <button class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-primary' ; ?> me-2" data-bs-toggle="modal" data-bs-target="#tambahpesanan"><i class="bi bi-plus-circle"></i> Pesanan</button>
        <button class="<?php echo (!empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-success' ; ?> me-2" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>
      <button onclick="printStruk()" class="<?php echo (empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-info' ; ?>"><i class="bi bi-printer"></i> Struk</button>
        </div>
        </div>
    </div>
</div>

<!-- Struk -->
<div id="Struk" class="d-none">
  <style>
    #struk {
      font-family: Arial, sans-serif;
      font-size: 12px;
      max-width: 300px;
      border: 1px solid #ccc;
      padding: 10px;
      width: 80mm;
    }
    #struk h2{
      text-align: center;
      color: #333;
    }
    #struk p {
      margin: 5px 0;
    }
    #struk table{
      font-size: 12px;
      border-collapse: collapse;
      margin-top: 10px;
      width: 100%;
    }
    #struk th, #struk td{
      border: 1px solid #ddd;
      padding: 8px;
    }
    #struk .total{
      font-weight: bold;
    }
  </style>
  <div id="struk">
  <h2>Struk Pembayaran </h2>
  <p>Kode Order: <?php echo $kode ?></p>
  <p>Waktu Bayar: <?php echo date('d/m/Y H:i:s', strtotime($result[0]['waktu_bayar'])) ?></p>
  <p>Pelanggan: <?php echo $nama ?></p>
  <table class="table table-responsive num-rows" >
  <thead>
                    <tr>
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
                                <?php echo number_format($row['harga'], 2, ',', '.') ?>
                            </td>
                            <td>
                                <?php echo $row['jumlah_produk'] ?>
                            </td>
                            <td>
                                <?php echo number_format($row['hasilnya'], 2, ',', '.') ?>
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
                            <?php echo number_format( $total,2,',', '.') ?>
                        </td>
                    </tr>
                    <tr>
                        <tr colspan="4">
                            Nominal Uang
                </td>
                <td class="fw-semibold">
                    <?php echo number_format($row['nominal_uang'],2,',','.')?>
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Uang Kembalian
                </td>
                <?php $kembalian=$total-$row['nominal_uang']?>
                <td class="fw-semibold">
                     <?php echo number_format($kembalian,2,',','.')?>
                </td>
                </tr>                           
                </tbody>
  </table>
  </div>
</div>

<script>
  function printStruk() {
    var Struk = document.getElementById("Struk").innerHTML;

    var Print = document.createElement('iframe');
    Print.style.display = 'none';
    document.body.appendChild(Print);
    Print.contentDocument.write(Struk);
    Print.contentWindow.print();
    document.body.removeChild(Print);

  }
</script>