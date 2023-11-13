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
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
$namaLengkap = $_POST['namaLengkap'];
$kelompok = $_POST['kelompok'];

// Query untuk menyimpan data ke tabel "peserta"
$query = "INSERT INTO user (username, password, namaLengkap, kelompok) VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $namaLengkap);
    $stmt->bindParam(4, $kelompok);
    $stmt->execute();
    
    header("Location: ../database-peserta.php?success=1");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>