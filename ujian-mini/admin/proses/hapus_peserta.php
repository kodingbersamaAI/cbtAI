<?php
session_start();

// Koneksi ke database (ganti dengan koneksi sesuai konfigurasi Anda)
include "../../server/koneksi.php";
include "../../server/sesi.php";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Tangkap ID peserta yang akan dihapus dari URL (misalnya: hapus_user.php?id=123)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../database-peserta.php?error=1");
    exit();
}

// Query untuk menghapus peserta berdasarkan ID
$query = "DELETE FROM user WHERE id = ?";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../database-peserta.php?success=2");
    exit();
} catch (PDOException $e) {
    header("Location: ../database-peserta.php?error=2");
    exit();
}
?>