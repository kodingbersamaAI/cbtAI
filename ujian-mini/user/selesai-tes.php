<?php 
include "../server/koneksi.php";
include "../server/sesi.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selesai Tes - CBT AI</title>

  <?php include "../universal/head.php" ?>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <img src="../../adminlte/img/icon.png" style="max-height:80px;"><br>
      <a href="../index.php" class="h1"><b>CBT</b>AI</a>
      <a href="https://koding-bersama-ai.great-site.net"></a>
    </div>
    <div class="card-body text-center">
      <p class="login-box-msg">Anda telah menyelesaikan tes.<br>Sampai jumpa dilain kesempatan.</p>
      <a href="../selamat-datang/logout.php" class="btn btn-danger">Selesai</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- ./wrapper -->

<?php include "../universal/script.php" ?>

<!-- Page Specific Script -->

</body>
</html>