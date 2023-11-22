<?php
// Mulai sesi
session_start();
require_once "../server/koneksi.php";

// Hapus semua data sesi
session_unset();

// Hapus sesi
session_destroy();

// Redirect ke halaman index.php
header("Location: ../index.php");
exit();
?>
