<?php 
include "../server/koneksi.php";
include "../server/sesi.php"; 

if (!isset($_SESSION['nama'])) {
    header("Location: ../selamat-datang/login.php");
    exit();
}

$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konfirmasi Tes - CBT AI</title>

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
          <div class="col-12">
          </div>
          <div class="col-md-6 col-12">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Aturan Peserta Ujian Mikoru CBT</h3>
              </div>
              <div class="card-body">
                <ol>
                  <li>Peserta ujian adalah pengguna yang namanya terdapat dalam database Mikoru CBT.</li>
                  <li>Peserta ujian menggunakan pakaian yang rapi, sopan, menutup aurat, memakai sepatu Peserta pria menggunakan kemeja, dan peserta wanita memakai rok/dress. Dilarang menggunakan kaos, atau bahan yang menampilkan lekuk tubuh, ataupun pakaian berbahan jeans, sweater/jaket/outer.</li>
                  <li>Peserta ujian wajib membawa dan menunjukkan kartu identitas (berupa KTP, SIM, atau kartu peserta) kepada pengawas klaster saat ujian berlangsung.</li>
                  <li>Peserta ujian masuk ke ruang ujian hanya membawa kartu identitas (tidak perlu membawa alat tulis atau alat elektronik atau barang lain).</li>
                  <li>Peserta ujian hadir di lokasi ujian minimal 45 menit dari waktu ujian dimulai (sesuai dengan jadwal ujian) dan langsung menempati tempat duduk yang telah ditentukan. Apabila terdapat peserta ujian yang datang saat proses ujian CBT sudah dimulai, maka tidak diperkenankan ikut ujian tanpa izin dari pengawas ujian.</li>
                  <li>Peserta masuk ke ruang CBT setelah diperbolehkan masuk oleh panitia/pengawas dan wajib melalui proses screening oleh pengawas/petugas sesuai dengan jenis kelamin.</li>
                  <li>Peserta ujian yang hendak ke toilet saat proses pengerjaan ujian, wajib lapor ke Pengawas Klaster ujian. Pengawas Klaster ujian wajib untuk mendampingi/mengawasi peserta ujian bersangkutan sampai kembali ke work station-nya. Tidak diperbolehkan ada 2 peserta yang ijin ke toilet secara bersamaan.</li>
                  <li>Peserta ujian wajib menjaga kerahasiaan informasi username dan password yang tersedia di work station masing-masing.</li>
                  <li>Selama proses ujian berlangsung, peserta ujian TIDAK diperbolehkan membuka selain halaman ujian Mikoru CBT.</li>
                  <li>Peserta ujian DILARANG membawa serta menggunakan gawai (handphone dan tablet), kamera, earphone, voice recorder, jam tangan, flashdisk, atau bentuk alat elektronik yang lain di dalam ruang ujian. Barang-barang pribadi harus diletakkan atau dititipkan pada tempat yang telah disediakan.</li>
                  <li>Peserta ujian DILARANG berbicara atau berkomunikasi dalam bentuk apapun dengan peserta ujian lain, atau dengan orang lain di luar lokasi ujian selama proses ujian berlangsung.</li>
                  <li>PESERTA UJIAN HARUS BEKERJA SECARA MANDIRI DAN TIDAK DIPERKENANKAN MENDAPAT BANTUAN PENGERJAAN DENGAN CARA APAPUN SEPERTI:
                    <ul>
                      <li>BEKERJASAMA DENGAN PESERTA UJIAN LAIN, JOKI, ATAU SIAPAPUN DALAM PENGERJAAN SOAL UJIAN.</li>
                      <li>MENGGUNAKAN FASILITAS BUKU, E-BOOK, ATAU PERANGKAT APAPUN DALAM PENGERJAAN SOAL UJIAN.</li>
                    </ul>
                  </li>
                  <li>PESERTA UJIAN DILARANG KERAS:
                    <ul>
                      <li>MENDOKUMENTASIKAN SOAL DALAM BENTUK SCREEN CAPTURE/PRINT SCREEN, MENGUNDUH, MENYALIN, DAN BERBAGAI CARA LAINNYA.</li>
                      <li>MELAKUKAN KECURANGAN SELAIN YANG TELAH DISEBUTKAN TERKAIT DENGAN KEAMANAN SOAL  UJIAN.</li>
                    </ul>
                  </li>
                  <li>Apabila ada kesulitan dan atau terjadi kesalahan teknis dalam proses ujian, peserta ujian hanya diperkenankan bertanya pada Pengawas Klaster ujian.</li>
                  <li>Peserta ujian wajib menjaga ketenangan, ketertiban, serta protokol kesehatan selama proses ujian berlangsung.</li>
                  <li>Peserta ujian TIDAK diperkenankan meninggalkan lokasi ujian selama ujian berlangsung dengan alasan apapun.</li>
                  <li>Setelah waktu ujian selesai, peserta ujian harus melakukan klik “kumpulkan ujian”. </li>
                  <li>PESERTA YANG MELANGGAR TATA TERTIB UJIAN CBT LURING HARUS BERSEDIA MENERIMA SANKSI.</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Konfrmasi Keamanan</h3>
              </div>
              <div class="card-body">
                <p>Selamat datang, <strong><?php echo $nama; ?></strong></p>
                <ol>
                  <li>Sebelum memulai ujian, harap masukkan token yang diperoleh dari pengawas ujian CBT.</li>
                  <li>Serta pastikan Anda telah membaca dan memahami Aturan Peserta Ujian Mikoru CBT.</li>
                  <li>Apabila terkendala token salah / tidak aktif silakan menghubungi pengawas.</li>
                </ol>
                <hr>
                <form action="proses/konfirmasi_token.php" method="post">
                  <div class="form-group">
                    <label for="token">Masukkan Token:</label>
                    <input type="text" name="token" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Konfirmasi Token</button>
                </form>
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

<!-- Page Specific Script -->

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
        text: 'Token tidak valid.'
      });
    }

    if (errorParam === '2') {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Tes sudah selesai dikerjakan.'
      });
    }
  });
</script>

</body>
</html>