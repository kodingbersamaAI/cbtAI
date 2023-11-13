<?php 
include "../server/koneksi.php";
include "../server/sesi.php"; 

// Query untuk mengambil data dari tabel topik
$querySoal = "SELECT * FROM soal";
$resultSoal = $conn->query($querySoal);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Soal - CBT AI</title>

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
                <h3 class="card-title">Database Topik</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalTambahTopik' data-alt='Tambah Data Topik'>
                  <i class='fas fa-book-open'></i> Tambah Topik
                </button>
                <!-- Modal untuk Tambah Topik -->
                <div class="modal fade" id="modalTambahTopik" tabindex="-1" role="dialog" aria-labelledby="modalTambahTopikLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTopikLabel">Tambah Topik</h5>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses/tambah_topik.php" method="post">
                          <div class="form-group">
                            <label for="topik">Topik</label>
                            <input type="text" class="form-control" name="topik" placeholder="Nama topik" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Tambah Topik</button>
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
                <table id="soalTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Topik</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $queryDataTopik = "SELECT * FROM topik";
                    $resultDataTopik = $conn->query($queryDataTopik);
                    $no = 1;
                    while ($row = $resultDataTopik->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["topik"] . "</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_topik.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Topik' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data topik ini? Menghapus data topik juga akan menghapus data soal di dalam topik.');\">
                              <i class='fas fa-trash'></i>
                            </a>&nbsp;";
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
                <h3 class="card-title">Database Soal</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalTambah' data-alt='Tambah Data Soal'>
                  <i class='fas fa-plus'></i> Tambah Soal
                </button>
                <!-- Modal untuk Tambah Soal -->
                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Soal</h5>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses/tambah_soal.php" method="post">
                          <div class="form-group">
                            <label for="topik">Topik</label>
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
                            <label for="pertanyaan">Pertanyaan</label>
                            <textarea class="form-control" name="pertanyaan" rows="4" placeholder="Pertanyaan" required></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <input type="text" class="form-control" name="Pilihan_A" placeholder="Pilihan A" required>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="number" class="form-control" name="Bobot_Jawaban_A" placeholder="Bobot Jawaban A" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <input type="text" class="form-control" name="Pilihan_B" placeholder="Pilihan B" required>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="number" class="form-control" name="Bobot_Jawaban_B" placeholder="Bobot Jawaban B" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <input type="text" class="form-control" name="Pilihan_C" placeholder="Pilihan C" required>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="number" class="form-control" name="Bobot_Jawaban_C" placeholder="Bobot Jawaban C" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <input type="text" class="form-control" name="Pilihan_D" placeholder="Pilihan D" required>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="number" class="form-control" name="Bobot_Jawaban_D" placeholder="Bobot Jawaban D" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <input type="text" class="form-control" name="Pilihan_E" placeholder="Pilihan E" required>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="number" class="form-control" name="Bobot_Jawaban_E" placeholder="Bobot Jawaban E" required>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Tambah Soal</button>
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
                <table id="topikTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pertanyaan</th>
                      <th>Topik</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = $resultSoal->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . substr($row["Pertanyaan"], 0, 20) . " ...</td>";
                      echo "<td>" . $row["topik"] . "</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_soal.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Soal' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data soal ini?');\">
                              <i class='fas fa-trash'></i>
                            </a>&nbsp;";
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
    $("#topikTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#topikTable_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(function () {
    $("#soalTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#soalTable_wrapper .col-md-6:eq(0)');
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