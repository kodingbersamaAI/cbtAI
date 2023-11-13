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

// Fungsi untuk menghasilkan token
function generateRandomToken($length = 32) {
    $token = bin2hex(random_bytes($length / 2)); // Generates a random hexadecimal token
    return $token;
}

// Menghasilkan token baru
$token = generateRandomToken(6);

// Simpan token ke dalam database (misalnya dalam tabel 'token' dengan kolom 'token')
$query = "INSERT INTO token (token) VALUES (?)";
$stmt = $db->prepare($query);
$stmt->bindParam(1, $token);
$stmt->execute();

header("Location: ../database-token.php?success=1");
exit();
?>
