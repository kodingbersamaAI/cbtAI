<?php
// Koneksi ke database (ganti dengan koneksi sesuai konfigurasi Anda)
include '../include/cbt_koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kelompok = $_POST['kelompok'];
    $topik = $_POST['topik'];

    $query = "SELECT * FROM nilai WHERE kelompok = ? AND topik = ?";
    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $kelompok);
        $stmt->bindParam(2, $topik);
        $stmt->execute();

        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
    }
}
?>