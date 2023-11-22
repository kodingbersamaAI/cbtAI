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
  <title>Database Kunci Soal - CBT AI</title>

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
                <h3 class="card-title">Database Kunci Soal</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="kunciTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Topik</th>
                      <th>Pertanyaan</th>
                      <th>Jawaban + Bobot</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = $resultSoal->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $row["topik"] . "</td>";
                      echo "<td>" . $row["Pertanyaan"] . "</td>";
                      // Ambil data pilihan dan bobot dari tabel soal
                      $pilihanA = $row['Pilihan_A'];
                      $bobotA = $row['Bobot_Jawaban_A'];
                      $pilihanB = $row['Pilihan_B'];
                      $bobotB = $row['Bobot_Jawaban_B'];
                      $pilihanC = $row['Pilihan_C'];
                      $bobotC = $row['Bobot_Jawaban_C'];
                      $pilihanD = $row['Pilihan_D'];
                      $bobotD = $row['Bobot_Jawaban_D'];
                      $pilihanE = $row['Pilihan_E'];
                      $bobotE = $row['Bobot_Jawaban_E'];

                      // Gabungkan data pilihan dan bobot menjadi satu teks
                      $dataPilihanDanBobot = "A: $pilihanA ($bobotA), <br>B: $pilihanB ($bobotB), <br>C: $pilihanC ($bobotC), <br>D: $pilihanD ($bobotD), <br>E: $pilihanE ($bobotE)";

                      echo "<td>" . $dataPilihanDanBobot . "</td>";
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
    $("#kunciTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf", "print", "colvis"]
    }).buttons().container().appendTo('#kunciTable_wrapper .col-md-6:eq(0)');
  });
</script>

</body>
</html>