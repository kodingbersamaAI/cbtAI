<?php
include "../../server/koneksi.php";
include "../../server/sesi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jawaban = $_POST['jawaban']; // Ini adalah array yang berisi jawaban pengguna untuk setiap soal.
    $topik = $_GET['topik']; // Ambil topik dari URL

    // Ambil nama pengguna dari session (gantilah sesuai dengan nama variabel session Anda)
    $nama_pengguna = $_SESSION['nama'];
    $kelompokSesi = $_SESSION['kelompok'];

    // Inisialisasi nilai awal
    $nilai = 0;

    // Loop melalui jawaban pengguna
    foreach ($jawaban as $id_soal => $bobot) {
        // $id_soal adalah ID soal, dan $bobot adalah bobot yang dipilih oleh pengguna

        // Query SQL untuk mengambil bobot jawaban yang benar dari tabel soal
        $query = "SELECT Bobot_Jawaban_A, Bobot_Jawaban_B, Bobot_Jawaban_C, Bobot_Jawaban_D, Bobot_Jawaban_E FROM soal WHERE id = '$id_soal'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Periksa jawaban yang benar dan tambahkan bobotnya ke nilai jika benar
            if ($bobot == $row['Bobot_Jawaban_A'] || $bobot == $row['Bobot_Jawaban_B'] || $bobot == $row['Bobot_Jawaban_C'] || $bobot == $row['Bobot_Jawaban_D'] || $bobot == $row['Bobot_Jawaban_E']) {
                $nilai += $bobot;
            }
        }
    }

    // Masukkan data nilai ke dalam tabel "nilai"
    $querySimpanNilai = "INSERT INTO nilai (nama, kelompok, topik, nilai) VALUES ('$nama_pengguna', '$kelompokSesi', '$topik', $nilai)";
    $resultSimpanNilai = mysqli_query($conn, $querySimpanNilai);

    if ($resultSimpanNilai) {
        // Nilai berhasil disimpan ke dalam tabel "nilai"
        echo "Nilai Anda telah disimpan.";
    } else {
        // Terjadi kesalahan saat menyimpan nilai
        echo "Terjadi kesalahan saat menyimpan nilai.";
    }

    // Setelah nilai berhasil disimpan
    // Hapus semua data sesi
    session_unset();

    // Hapus sesi
    session_destroy();

    // Arahkan ke halaman    
    header('Location: ../selesai-tes.php');
    exit;
}
?>