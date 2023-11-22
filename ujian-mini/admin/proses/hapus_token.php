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

// Tangkap ID token yang akan dihapus dari URL (misalnya: hapus_user.php?id=123)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $_SESSION['error_message'] = "ID token tidak valid.";
    header("Location: ../database-token.php?error=1");
    exit();
}

// Query untuk menghapus token berdasarkan ID
$query = "DELETE FROM token WHERE id = ?";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../database-token.php?success=2");
    exit();
} catch (PDOException $e) {
    header("Location: ../database-token.php?error=2");
    exit();
}
?>