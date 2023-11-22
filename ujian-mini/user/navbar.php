<?php 

$allowed_roles = array("user");
if (!in_array($_SESSION['role'], $allowed_roles)) {
    header("Location: ../index.php"); // Halaman untuk akses tidak sah
    exit();
}
?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" id="jam"></a>
        <script>
          function tampilkanJam() {
              var waktu = new Date();
              var jam = waktu.getHours();
              var menit = waktu.getMinutes();
              var detik = waktu.getSeconds();

              // Tambahkan nol di depan jika jam, menit, atau detik kurang dari 10
              jam = (jam < 10) ? "0" + jam : jam;
              menit = (menit < 10) ? "0" + menit : menit;
              detik = (detik < 10) ? "0" + detik : detik;

              var waktuSekarang = jam + ":" + menit + ":" + detik;
              document.getElementById("jam").innerHTML = waktuSekarang;
          }

          // Pembaruan setiap detik
          setInterval(tampilkanJam, 1000);
        </script>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>  <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Anda login sebagai Peserta</span>
          <div class="dropdown-divider"></div>
          <a href="../server/logout.php" class="dropdown-item">
            <i class="fas fa-arrow-circle-right mr-2"></i> Logout
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->