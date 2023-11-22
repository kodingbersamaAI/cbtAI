<?php
$host = "sql105.infinityfree.com";
$server = "sql105.infinityfree.com"; // Ganti dengan server basis data Anda
$username = "if0_35374421"; // Ganti dengan username basis data Anda
$password = "ea79hglXtsXNXy"; // Ganti dengan password basis data Anda
$database = "if0_35374421_cbtai"; // Ganti dengan nama basis data Anda
$dbname = "if0_35374421_cbtai"; // Ganti dengan nama basis data Anda

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
