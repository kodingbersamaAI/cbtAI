<?php 
include '../../include/cbt_koneksi.php';
include '../../include/cbt_sesi.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Mikoru CBT</title>

  <?php include '../../include/head.php' ?>
  
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
          <div class="col-md-3 col-12">
            <div class="card card-outline card-danger flex-column">
              <div class="card-header">
                  <h3 class="card-title">Sisa Waktu</h3>
              </div>
              <div class="card-body">
                <h3><div id="timer">00:00</div></h3> menit <!-- Elemen timer -->
                <?php
                // Periksa apakah parameter topik ada dalam URL
                if (isset($_GET['topik'])) {
                  $topik = $_GET['topik'];

                  // Query SQL untuk mengambil soal berdasarkan topik
                  $queryDurasi = "SELECT * FROM tes WHERE topik = '$topik'";
                  $resultDurasi = mysqli_query($conn, $queryDurasi);

                  // Periksa apakah query berhasil
                  if ($resultDurasi) {
                     while ($row = mysqli_fetch_assoc($resultDurasi)) {
                    $id = $row['id'];
                    $durasi = $row['durasi'];
                  }          
                  }        
                }
                ?>
                <script>
                    // Ambil nilai durasi dalam menit dari tabel tes (ganti ini dengan cara Anda mengambil nilai dari tabel tes)
                    const durasiMenit = <?php echo "$durasi";?>; // Contoh: durasi 30 menit

                    // Hitung total detik dari durasi dalam menit
                    let totalDetik = durasiMenit * 60;

                    // Elemen untuk menampilkan timer
                    const timerElem = document.getElementById('timer');

                    // Fungsi untuk memperbarui tampilan timer
                    function perbaruiTimer() {
                        const menit = Math.floor(totalDetik / 60);
                        const detik = totalDetik % 60;

                        const menitString = menit.toString().padStart(2, '0');
                        const detikString = detik.toString().padStart(2, '0');

                        timerElem.textContent = menitString + ':' + detikString;

                        if (totalDetik === 300) {
                            alert('Waktu mengerjakan tersisa 5 menit.');
                        }

                        if (totalDetik === 0) {
                            clearInterval(timerInterval); // Menghentikan interval timer
                            // Mengirim form secara otomatis
                            const form = document.getElementById('form');
                            if (form) {
                                form.submit();
                            } else {
                                alert('Form tidak ditemukan.');
                            }
                        } else {
                            totalDetik--;
                        }
                    }

                    // Memanggil fungsi perbaruiTimer setiap detik
                    perbaruiTimer();
                    const timerInterval = setInterval(perbaruiTimer, 1000);
                </script>
              </div>
            </div>
            <div class="card card-outline card-success flex-column mt-3">
              <div class="card-header">
                <h3 class="card-title">Navigasi Soal</h3>
              </div>
              <div class="card-body">
                <!-- Tombol Navigasi -->
                <?php
                if (isset($_GET['topik'])) {
                    $topik = $_GET['topik'];
                    
                    $queryJumlahSoal = "SELECT id FROM soal WHERE topik = '$topik' ORDER BY id ASC";
                    $resultJumlahSoal = $conn->query($queryJumlahSoal);
                    $totalSoal = $resultJumlahSoal->num_rows;

                    for ($nomorUrut = 1; $nomorUrut <= $totalSoal; $nomorUrut++) {
                        echo '<button class="btn btn-outline-success m-1" onclick="pilihSoal(' . $nomorUrut . ')">' . $nomorUrut . '</button>';
                    }
                }
                ?><br><br>
                <button class="btn btn-success" onclick="soalSebelumnya()"><li class="fas fa-arrow-circle-left"></li></button>
                <button class="btn btn-success" onclick="soalSelanjutnya()"><li class="fas fa-arrow-circle-right"></li></button>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-12">
          <?php
          // Periksa apakah parameter topik ada dalam URL
          if (isset($_GET['topik'])) {
            $topik = $_GET['topik'];

            // Query SQL untuk mengambil soal berdasarkan topik
            $query = "SELECT * FROM soal WHERE topik = '$topik'";
            $result = mysqli_query($conn, $query);

            // Periksa apakah query berhasil
            if ($result) {
              // Inisialisasi variabel untuk menyimpan total bobot jawaban
              $totalBobot = 0;

              // Menghitung total soal
              $totalSoal = mysqli_num_rows($result);

              // Buat formulir untuk jawaban
              echo '<form id="form" method="post" action="../../proses/cbt_proses_jawaban_tes.php?topik=' . $topik . '">';
              $nomorUrut = 1; // Inisialisasi nomor urut
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $pertanyaan = $row['Pertanyaan'];
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

                // Tampilkan soal di dalam card HTML
                echo '
                <div class="card card-outline card-primary soal" id="soal"' . $id . '"';                
                echo '>';
                echo '<div class="card-header">';
                echo '<h3 class="card-title">Soal No. ' . $nomorUrut . ' dari ' . $totalSoal .'</h3>';
                echo '</div>';
                echo '<div class="card-body">';
                echo '<p>' . $pertanyaan . '</p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotA . '"> ' . $pilihanA . '
                </p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotB . '"> ' . $pilihanB . '
                </p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotC . '"> ' . $pilihanC . '
                </p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotD . '"> ' . $pilihanD . '
                </p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotE . '"> ' . $pilihanE . '
                </p>';

                echo '</div>';
                echo '</div>';
                $nomorUrut++;
              }
              
              // Tampilkan tombol "Kirim Jawaban"
              echo '<button class="btn btn-sm btn-danger" type="submit" name="submit">Akhiri Ujian</button>';
              echo '</form>';
              echo '</div>';
            } 
          }
          ?>
          </div>
        </div>
      </div>
    <!-- /.content-here -->

  </div>
  <!-- /.content-wrapper -->

  <?php include '../../include/cbt_footer.php'  ?>

</div>
<!-- ./wrapper -->

<?php include '../../include/script.php' ?>

<!-- Page Specific Script -->

</body>
</html>