<?php 
include "../server/koneksi.php";
include "../server/sesi.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilih Tes - CBT AI</title>

  <?php include "../universal/head.php" ?>
  
</head>
<body class="hold-transition layout-top-nav layout-footer-fixed layout-navbar-fixed layout-fixed">
<div class="wrapper">

  <?php include 'navbar.php' ?>

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
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Petunjuk Penggunaan</h3>
              </div>
              <div class="card-body">
                <ol>
                  <li>Pilihlah topik ujian pada menu Daftar Ujian CBT.</li>
                  <li>Apabila tidak terdapat topik, bisa jadi disebabkan oleh:</li>
                    <ul>
                      <li>Sedang tidak ada ujian berlangsung.</li>
                      <li>Anda sudah pernah mengerjakan topik tersebut.</li>
                    </ul>
                  <li>Harap untuk tidak merefresh / menekan tombol f5 karena akan menyebabkan pengulangan pengerjaan.</li>
                  <li>Terdapat navigasi soal di bagian kiri layar untuk berpindah antar soal.</li>
                  <li>Terdapat tombol ragu-ragu untuk menandai nomor soal yang jawabannya dianggap masih ragu.</li>
                  <li>Terdapat tombol "Akhiri Ujian" untuk mengirim lembar jawaban, pastikan Anda sudah yakin sebelum mengakhiri, karena lembar ujian tidak bisa dikerjakan lagi.</li>
                </ol>
                <hr>
                <h5 style="text-align: center;">-- Selamat Mengerjakan --</h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Ujian CBT</h3>
              </div>
              <?php
              // Ambil 'kelompok' dari sesi pengguna
              $kelompokSesi = $_SESSION["kelompok"];

              // Query untuk mengambil informasi tes berdasarkan 'kelompok'
              $queryTes = "SELECT * FROM tes WHERE kelompok = '$kelompokSesi'";
              $resultTes = $conn->query($queryTes);

              if (mysqli_num_rows($resultTes) > 0) {
                  while ($row = mysqli_fetch_assoc($resultTes)) {
                      $topik = $row['topik'];
                      $durasi = $row['durasi'];
                      
                      // Ambil nama dari sesi (sesuaikan dengan cara Anda)
                      $nama = $_SESSION['nama']; // Sesuaikan dengan sesi nama yang Anda gunakan
                      
                      // Query untuk memeriksa apakah ada entri sesi pada tabel nilai
                      $queryCekSesi = "SELECT * FROM nilai WHERE nama = '$nama' AND topik = '$topik'";
                      $resultCekSesi = mysqli_query($conn, $queryCekSesi);
                      
                      if (mysqli_num_rows($resultCekSesi) == 0) {
                          // Tidak ada entri sesi pada tabel nilai, maka tampilkan tombol "Mulai Ujian"
                          echo '<div class="card-body">';
                          echo '<div class="callout callout-success">';
                          echo '<h5>Topik Tes: ' . $topik . '</h5>';
                          echo '<p>Durasi Ujian: ' . $durasi . ' menit</p>';
                          echo '<a href="kerjakan-tes.php?topik=' . urlencode($topik) . '" class="btn btn-block btn-outline-success">Mulai Ujian</a>';
                          echo '</div>';
                          echo '</div>';
                      }
                  }
              } else {
                echo '<div class="card-body">';
                echo '<p>Tidak ada tes yang tersedia saat ini.</p>';
                echo '</div>';
              }
              ?>
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

<!-- Page Specific Script -->

</body>
</html>