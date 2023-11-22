<?php 
include "../server/koneksi.php";
include "../server/sesi.php";

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    // Pengguna sudah login, alihkan ke halaman yang sesuai
    if ($_SESSION['role'] === 'admin') {
        header('Location: ../admin/dashboard.php');
    } elseif ($_SESSION['role'] === 'user') {
        header('Location: ../user/dashboard.php');
    } else {
        header('Location: ../selamat-datang/login.php'); // Atur halaman default jika peran tidak sesuai
    }
    exit();
} 

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - CBT AI</title>

  <?php include "../universal/head.php" ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="../../adminlte/img/icon.png" style="max-height:80px;"><br>
      <a href="../../index.php" class="h1"><b>CBT</b>AI</a>
      <a href="https://koding-bersama-ai.great-site.net"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

      <form action="proses/proses_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- Script -->

<?php include "../universal/script.php" ?>

<script>
  $(document).ready(function() {
    // Cek apakah parameter success=1 ada di URL
    var successParam = new URLSearchParams(window.location.search).get('success');
    var errorParam = new URLSearchParams(window.location.search).get('error');
    
    if (successParam === '1') {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Berhasil menambahkan data buku.'
      });
    }

    if (errorParam === '1') {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Cek username dan password Anda.'
      });
    }
  });
</script>

</body>
</html>
