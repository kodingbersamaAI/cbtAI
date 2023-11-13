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

// Tangkap data yang dikirimkan melalui POST
$topik = $_POST['topik'];


// Query untuk menyimpan data ke tabel "topik"
$query = "INSERT INTO topik (topik) VALUES (?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $topik);
    $stmt->execute();
    
    header("Location: ../database-soal.php?success=1");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>