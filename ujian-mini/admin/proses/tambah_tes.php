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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data yang dikirimkan melalui POST
    $kelompok = $_POST['kelompok'];
    $topik = $_POST['topik'];
    $durasi = $_POST['durasi'];
    
    // Query untuk menambahkan data ke tabel tes
    $queryTambahTes = "INSERT INTO tes (kelompok, topik, durasi) VALUES (?, ?, ?)";

    try {
        // Tambahkan data ke tabel tes
        $stmtTambahTes = $db->prepare($queryTambahTes);
        $stmtTambahTes->bindParam(1, $kelompok);
        $stmtTambahTes->bindParam(2, $topik);
        $stmtTambahTes->bindParam(3, $durasi);
        $stmtTambahTes->execute();

        header("Location: ../database-tes.php?success=1");
        exit();
    } catch (PDOException $e) {
        header("Location: ../database-tes.php?error=2");
        exit();
    }
} else {
    // Redirect jika tidak menggunakan metode POST
    header("Location: ../database-tes.php?error=1");
    exit();
}
?>
