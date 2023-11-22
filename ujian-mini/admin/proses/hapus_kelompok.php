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

// Tangkap ID kelompok yang akan dihapus dari URL (misalnya: hapus_kelompok.php?id=123)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../database-kelompok.php?error=1");
    exit();
}

// Setelah menghapus pengguna dengan kelompok yang sama, mari kita hapus kelompok
try {
    // Query untuk menghapus pengguna dengan kelompok yang sesuai
    $queryUser = "DELETE FROM user WHERE kelompok = (SELECT kelompok FROM kelompok WHERE id = ?)";
    $stmt = $db->prepare($queryUser);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    // Kemudian, mari kita hapus kelompok
    $queryKelompok = "DELETE FROM kelompok WHERE id = ?";
    $stmt = $db->prepare($queryKelompok);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../database-peserta.php?success=2");
    exit();
} catch (PDOException $e) {
    header("Location: ../database-peserta.php?error=2");
    exit();
}
?>