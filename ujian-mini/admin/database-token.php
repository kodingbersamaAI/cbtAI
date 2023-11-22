<?php 
include "../server/koneksi.php";
include "../server/sesi.php"; 

// Query untuk mengambil data dari tabel token
$queryToken = "SELECT * FROM token";
$resultToken = $conn->query($queryToken);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Token - Mikoru CBT</title>

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
                <h3 class="card-title">Database Token</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="proses/generate_token.php" class="btn btn-primary" class="btn btn-primary"><i class="fas fa-key"></i> Buat Token</a> 
                <br><br>
                <table id="tokenTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Token</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $queryDataToken = "SELECT * FROM token";
                    $resultDataToken = $conn->query($queryDataToken);
                    $no = 1;
                    while ($row = $resultDataToken->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["token"] . "</td>";
                      echo "<td>";
                      // Tombol Hapus
                      echo "<a href='proses/hapus_token.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' alt='Hapus Data Token' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data token ini? Menghapus data token juga akan menghapus data soal di dalam token.');\">
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
    $("#tokenTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tokenTable_wrapper .col-md-6:eq(0)');
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
        text: 'Token berhasil dibuat.'
      });
    }

    if (successParam === '2') {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Tokem berhasil dihapus.'
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