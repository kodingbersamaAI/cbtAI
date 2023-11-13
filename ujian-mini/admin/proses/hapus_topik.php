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

// Tangkap ID topik yang akan dihapus dari URL (misalnya: hapus_topik.php?id=123)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../database-soal.php?error=1");
    exit();
}

// Setelah menghapus soal dengan topik yang sama, mari kita hapus topik
try {
    // Query untuk menghapus soal yang memuat topik yang sama
    $querySoal = "DELETE FROM soal WHERE topik = (SELECT topik FROM topik WHERE id = ?)";
    $stmt = $db->prepare($querySoal);
    $stmt->bindParam(1, $id, PDO::PARAM_STR); // Mengikat parameter ke kolom "topik"
    $stmt->execute();

    // Kemudian, mari kita hapus topik
    $queryTopik = "DELETE FROM topik WHERE id = ?";
    $stmt = $db->prepare($queryTopik);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../database-soal.php?success=2");
    exit();

} catch (PDOException $e) {
    header("Location: ../database-soal.php?error=2");
    exit();
}
?>
