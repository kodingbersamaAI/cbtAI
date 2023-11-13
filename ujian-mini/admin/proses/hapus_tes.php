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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus tes berdasarkan ID
    $queryHapusTes = "DELETE FROM tes WHERE id = ?";
    try {
        $stmt = $db->prepare($queryHapusTes);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../database-tes.php?success=2");
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
