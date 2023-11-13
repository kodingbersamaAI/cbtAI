<?php
session_start();

// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
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
    $topik = $_POST['topik'];
    $pertanyaan = $_POST['pertanyaan'];
    $pilihanA = $_POST['Pilihan_A'];
    $bobotA = $_POST['Bobot_Jawaban_A'];
    $pilihanB = $_POST['Pilihan_B'];
    $bobotB = $_POST['Bobot_Jawaban_B'];
    $pilihanC = $_POST['Pilihan_C'];
    $bobotC = $_POST['Bobot_Jawaban_C'];
    $pilihanD = $_POST['Pilihan_D'];
    $bobotD = $_POST['Bobot_Jawaban_D'];
    $pilihanE = $_POST['Pilihan_E'];
    $bobotE = $_POST['Bobot_Jawaban_E'];

    // Query untuk menyimpan data soal ke tabel "soal"
    $query = "INSERT INTO soal (topik, Pertanyaan, Pilihan_A, Bobot_Jawaban_A, Pilihan_B, Bobot_Jawaban_B, Pilihan_C, Bobot_Jawaban_C, Pilihan_D, Bobot_Jawaban_D, Pilihan_E, Bobot_Jawaban_E) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $topik);
        $stmt->bindParam(2, $pertanyaan);
        $stmt->bindParam(3, $pilihanA);
        $stmt->bindParam(4, $bobotA);
        $stmt->bindParam(5, $pilihanB);
        $stmt->bindParam(6, $bobotB);
        $stmt->bindParam(7, $pilihanC);
        $stmt->bindParam(8, $bobotC);
        $stmt->bindParam(9, $pilihanD);
        $stmt->bindParam(10, $bobotD);
        $stmt->bindParam(11, $pilihanE);
        $stmt->bindParam(12, $bobotE);

        $stmt->execute();

        header("Location: ../database-soal.php?success=1");
        exit();
    } catch (PDOException $e) {
        header("Location: ../database-soal.php?error=2");
        exit();
    }
} else {
    // Redirect jika tidak menggunakan metode POST
    header("Location: ../database-soal.php?error=2");
    exit();
}
?>
