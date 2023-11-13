<?php
session_start();
include "../../server/koneksi.php";
include "../../server/sesi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];

    // Query untuk memeriksa token
    $query = "SELECT * FROM token WHERE token = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
    // Token sesuai, ambil data topik dari database berdasarkan token
    $row = $result->fetch_assoc();
    $topik = $row['topik'];
    $durasi = $row['durasi'];

    // Redirect ke halaman pilih-tes.php dengan parameter topik
    header("Location: ../pilih-tes.php");
    exit();

    } else {
        // Token tidak sesuai, beri pesan kesalahan dan arahkan kembali
        header("Location: ../dashboard.php?error=1");
        exit();
    }
}
?>