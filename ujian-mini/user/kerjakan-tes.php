<?php 
include "../server/koneksi.php";
include "../server/sesi.php";

// Ambil nama dan topik dari sesi atau dari data pengguna yang telah login
$nama = $_SESSION['nama']; // Gantilah ini dengan cara Anda mengambil nama pengguna
$topik = $_GET['topik']; // Gantilah ini dengan cara Anda mengambil topik dari URL

// Query SQL untuk memeriksa apakah nama dan topik sudah ada di tabel nilai
$queryCekNilai = "SELECT * FROM nilai WHERE nama = '$nama' AND topik = '$topik'";
$resultCekNilai = mysqli_query($conn, $queryCekNilai);

// Periksa apakah data sudah ada di tabel nilai
if (mysqli_num_rows($resultCekNilai) > 0) {
  // Jika ada, redirect pengguna kembali ke halaman awal atau berikan pesan kesalahan
  header('Location: dashboard.php?error=2'); // Ganti dengan URL halaman awal Anda
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ujian - Mikoru CBT</title>

  <?php include "../universal/head.php" ?>

  <style>
    .card-body p {
      display: flex;
      align-items: center;
    }

    .card-body input[type="radio"] {
      align-self: center;
      margin-right: 10px;
      width: 20px; /* Lebar tombol radio */
      height: 20px; /* Tinggi tombol radio */
    }
    /* CSS untuk mengubah tampilan checkbox */
    .checkbox-container {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .checkbox-input {
      display: none; /* Sembunyikan checkbox asli */
    }

    .checkbox-custom {
      position: relative;
      width: 20px;
      height: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-right: 10px;
    }

    .checkbox-custom::after {
      content: '';
      position: absolute;
      width: 12px;
      height: 12px;
      background-color: #f0ad4e; /* Warna "btn-warning" */
      border-radius: 2px;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      display: none; /* Sembunyikan tanda centang */
    }

    .checkbox-input:checked + .checkbox-custom::after {
      display: block; /* Tampilkan tanda centang ketika checkbox dicentang */
    }
    @media (min-width: 768px) {
      .col-sticky {
        position: -webkit-sticky; /* Untuk kompatibilitas dengan beberapa browser */
        position: sticky;
        top: 0; /* Atur posisi vertikal dari atas halaman */
        z-index: 100; /* Atur indeks z sesuai kebutuhan */
        align-self: flex-start
        /* Tambahkan properti lain sesuai kebutuhan Anda */
      }
    }
  </style>

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
          <div class="col-md-3 col-12 col-sticky">
            <div class="card card-outline card-secondary flex-column">
              <div class="card-header">
                <?php
                if (isset($_GET['topik'])) {
                  $topik = $_GET['topik'];
                }
                ?>
                <h3 class="card-title">Topik Ujian : <strong><?php echo $topik ?></strong></h3>
              </div>
            </div>
            <div class="card card-outline card-danger flex-column mt-3">
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

                    for ($nomorUrut = 01; $nomorUrut <= $totalSoal; $nomorUrut++) {
                        echo '<button class="btn m-1 btn-soal" onclick="pilihSoal(' . $nomorUrut . ')" id="soalBtn' . $nomorUrut . '">' . $nomorUrut . '</button>';
                    }
                }
                ?><br><br>
                <button class="btn btn-success" onclick="soalSebelumnya()"><li class="fas fa-arrow-circle-left"></li> Sebelumnya</button>
                <button class="btn btn-success" onclick="soalSelanjutnya()">Selanjutnya <li class="fas fa-arrow-circle-right"></li></button>
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
              echo '<form id="form" method="post" action="proses/jawaban_tes.php?topik=' . $topik . '">';
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
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotA . '" onchange="soalTerjawab[' . ($nomorUrut - 1) . '] = true; updateTombolStatus()"> ' . $pilihanA . '</p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotB . '" onchange="soalTerjawab[' . ($nomorUrut - 1) . '] = true; updateTombolStatus()"> ' . $pilihanB . '</p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotC . '" onchange="soalTerjawab[' . ($nomorUrut - 1) . '] = true; updateTombolStatus()"> ' . $pilihanC . '</p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotD . '" onchange="soalTerjawab[' . ($nomorUrut - 1) . '] = true; updateTombolStatus()"> ' . $pilihanD . '</p>';
                echo '<p>';
                echo '<input type="radio" name="jawaban[' . $id . ']" value="' . $bobotE . '" onchange="soalTerjawab[' . ($nomorUrut - 1) . '] = true; updateTombolStatus()"> ' . $pilihanE . '</p>';
                echo '<br>';
                echo '<label class="checkbox-container">';
                echo '<input type="checkbox" class="checkbox-input" onclick="toggleRaguRagu(' . ($nomorUrut - 1) . ')">';
                echo '<span class="checkbox-custom"></span>';
                echo ' Ragu-ragu';
                echo '</label>';
                echo '</div>';
                echo '</div>';
                $nomorUrut++;
              }
              
              // Tampilkan tombol "Kirim Jawaban"
              echo '<button class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin mengakhiri tes ini?\');" type="submit" name="submit">Akhiri Ujian</button>';
              echo '<br>';
              echo '<br>';
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

  <?php include "../universal/footer.php" ?>

</div>
<!-- ./wrapper -->

<?php include "../universal/script.php" ?>

<!-- Page Specific Script -->
<script>
  // Inisialisasi variabel untuk melacak nomor soal yang sedang ditampilkan
  let currentSoal = 1;

  // Semua elemen soal
  const soalElems = document.querySelectorAll('.soal');

  // Tombol "Sebelumnya" dan "Selanjutnya"
  const tombolSebelumnya = document.querySelector('#btnSebelumnya');
  const tombolSelanjutnya = document.querySelector('#btnSelanjutnya');

  // Fungsi untuk menampilkan soal yang sesuai
  function tampilkanSoal(nomor) {
    if (nomor < 1) {
      currentSoal = 1;
    } else if (nomor > soalElems.length) {
      currentSoal = soalElems.length;
    }

    // Semua elemen soal menjadi tidak terlihat
    soalElems.forEach(function(elem) {
      elem.style.display = 'none';
    });

    // Tampilkan soal yang sesuai
    soalElems[currentSoal - 1].style.display = 'block';

    // Sembunyikan atau tampilkan tombol "Sebelumnya" dan "Selanjutnya"
    if (currentSoal === 1) {
      tombolSebelumnya.style.display = 'none';
      tombolSelanjutnya.style.display = 'block';
    } else if (currentSoal === soalElems.length) {
      tombolSebelumnya.style.display = 'block';
      tombolSelanjutnya.style.display = 'none';
    } else {
      tombolSebelumnya.style.display = 'block';
      tombolSelanjutnya.style.display = 'block';
    }
  }

  // Fungsi untuk pindah ke soal selanjutnya
  function soalSelanjutnya() {
    tampilkanSoal(currentSoal += 1);
  }

  // Fungsi untuk pindah ke soal sebelumnya
  function soalSebelumnya() {
    tampilkanSoal(currentSoal -= 1);
  }

  // Fungsi untuk pilih soal
  function pilihSoal(nomorSoal) {
    currentSoal = nomorSoal;
    tampilkanSoal(currentSoal);
  }

  // Tampilkan soal pertama saat halaman dimuat
  tampilkanSoal(currentSoal);
</script>
<script>
  // Inisialisasi array untuk melacak apakah setiap soal sudah terjawab atau belum
  const soalTerjawab = Array(<?php echo $totalSoal; ?>).fill(false);
  const soalRagu = Array(<?php echo $totalSoal; ?>).fill(false);

  // Fungsi untuk mengubah class tombol sesuai dengan status jawaban
  function updateTombolStatus() {
    const tombolSoal = document.querySelectorAll('.btn-soal');
    tombolSoal.forEach((tombol, index) => {
      if (soalRagu[index]) {
        tombol.classList.remove('btn-outline-secondary', 'btn-primary');
        tombol.classList.add('btn-warning');
      } else if (soalTerjawab[index]) {
        tombol.classList.remove('btn-outline-secondary', 'btn-warning');
        tombol.classList.add('btn-primary');
      } else {
        tombol.classList.remove('btn-primary', 'btn-warning');
        tombol.classList.add('btn-outline-secondary');
      }
    });
  }
  updateTombolStatus();
</script>
<script>
  function toggleRaguRagu(index) {
    if (soalRagu[index]) {
      soalRagu[index] = false; // Toggle ke false (tidak ragu-ragu)
    } else {
      soalRagu[index] = true; // Toggle ke true (ragu-ragu)
    }
    updateTombolStatus();
  }
</script>

</body>
</html>