<?php 
include "../server/koneksi.php";
include "../server/sesi.php";

// Query untuk mengambil data dari tabel user
$queryUser = "SELECT * FROM user";
$resultUser = $conn->query($queryUser);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Peserta - CBT AI</title>

  <?php include "../universal/head.php" ?>
  
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed layout-fixed sidebar-collapse">
<div class="wrapper">

  <?php include 'navbar.php' ?>

  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Content Here -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Kelompok</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalTambahKelompok' data-alt='Tambah Data Kelompok'>
                  <i class='fas fa-users'></i> Tambah Kelompok
                </button>
                <!-- Modal untuk Tambah Kelompok -->
                <div class="modal fade" id="modalTambahKelompok" tabindex="-1" role="dialog" aria-labelledby="modalTambahKelompokLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKelompokLabel">Tambah Kelompok</h5>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses/tambah_kelompok.php" method="post">
                          <div class="form-group">
                            <label for="kelompok">Kelompok</label>
                            <input type="text" class="form-control" name="kelompok" placeholder="Nama kelompok" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Tambah Kelompok</button>
                        </form>
                      </div>
                      <div class='modal-footer justify-content-between'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <table id="kelompokTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kelompok</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $queryDataKelompok = "SELECT * FROM kelompok";
                    $resultDataKelompok = $conn->query($queryDataKelompok);
                    $no = 1;
                    while ($row = $resultDataKelompok->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["kelompok"] . "</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_kelompok.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Kelompok' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data kelompok ini? Menghapus data kelompok juga akan menghapus data peserta di dalam kelompok.');\"><i class='fas fa-trash'></i></a>&nbsp;";
                      echo "</td>";
                      echo "</tr>";
                      $no++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Peserta</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalTambah' data-alt='Tambah Data Peserta'>
                  <i class='fas fa-user-plus'></i> Tambah Peserta
                </button>
                <!-- Modal untuk Tambah Peserta -->
                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Peserta</h5>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses/tambah_peserta.php" method="post">
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Nama akun untuk peserta login aplikasi" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password akun untuk peserta login aplikasi" required>
                          </div>
                          <div class="form-group">
                            <label for="namaLengkap">Nama Lengkap Peserta</label>
                            <input type="text" class="form-control" name="namaLengkap" placeholder="Isi dengan nama lengkap peserta" required>
                          </div>
                          <div class="form-group">
                            <label for="kelompok">Kelompok</label>
                            <select class="form-control" name="kelompok" required>
                              <option value="">Pilih Kelompok</option>
                              <?php
                              $queryKelompok = "SELECT kelompok FROM kelompok";
                              $resultKelompok = $conn->query($queryKelompok);
                              while ($rowKelompok = $resultKelompok->fetch_assoc()) {
                                  echo "<option value='" . $rowKelompok["kelompok"] . "'>" . $rowKelompok["kelompok"] . "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Tambah Peserta</button>
                        </form>
                      </div>
                      <div class='modal-footer justify-content-between'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <table id="pesertaTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Kelompok</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = $resultUser->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["username"] . "</td>";
                      echo "<td>" . $row["namaLengkap"] . "</td>";
                      echo "<td>" . $row["kelompok"] . "</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_peserta.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Peserta' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data peserta ini?');\"><i class='fas fa-trash'></i></a>&nbsp;";
                      echo "</td>";
                      echo "</tr>";
                      $no++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-here -->

  </div>
  <!-- /.content-wrapper -->

  <?php include "../universal/footer.php" ?>

</div>
<!-- ./wrapper -->

<?php include "../universal/script.php" ?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#pesertaTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#pesertaTable_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(function () {
    $("#kelompokTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#kelompokTable_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(document).ready(function() {
    // Cek apakah parameter success=1 ada di URL
    var successParam = new URLSearchParams(window.location.search).get('success');
    var errorParam = new URLSearchParams(window.location.search).get('error');
    
    if (successParam === '1') {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data berhasil ditambahkan.'
      });
    }

    if (successParam === '2') {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data berhasil dihapus.'
      });
    }

    if (errorParam === '1') {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'ID peserta tidak valid.'
      });
    }

    if (errorParam === '2') {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Akses ditolak.'
      });
    }
  });
</script>

</body>
</html>