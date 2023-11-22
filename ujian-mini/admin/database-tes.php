<?php 
include "../server/koneksi.php";
include "../server/sesi.php";

// Query untuk mengambil data dari tabel user
$queryTes = "SELECT * FROM tes";
$resultTes = $conn->query($queryTes);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Tes - CBT AI</title>

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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Tes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalTambahTes' data-alt='Tambah Data Tes'>
                  <i class='fas fa-pencil-alt '></i> Tambah Tes
                </button>
                <!-- Modal untuk Tambah Tes -->
                <div class="modal fade" id="modalTambahTes" tabindex="-1" role="dialog" aria-labelledby="modalTambahTesLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTesLabel">Tambah Tes</h5>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses/tambah_tes.php" method="post">
                          <div class="form-group">
                            <label for="kelompok">Pilih Kelompok</label>
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
                          <p>Akan mengerjakan soal dari topik:</p>
                          <div class="form-group">
                            <label for="topik">Pilih Topik</label>
                            <select class="form-control" name="topik" required>
                              <option value="">Pilih Topik</option>
                              <?php
                              $queryTopik = "SELECT topik FROM topik";
                              $resultTopik = $conn->query($queryTopik);
                              while ($rowTopik = $resultTopik->fetch_assoc()) {
                                  echo "<option value='" . $rowTopik["topik"] . "'>" . $rowTopik["topik"] . "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="number" name="durasi" class="form-control" placeholder="Isi durasi (dalam menit)" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Tambahkan Topik ke Pengguna</button>
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
                      <th>Topik</th>
                      <th>Durasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = $resultTes->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["kelompok"] . "</td>";
                      echo "<td>" . $row["topik"] . "</td>";
                      echo "<td>" . $row["durasi"] . " menit</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_tes.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Tes' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data tes ini?');\"><i class='fas fa-trash'></i></a>&nbsp;";
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

<?php include '../universal/script.php' ?>

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