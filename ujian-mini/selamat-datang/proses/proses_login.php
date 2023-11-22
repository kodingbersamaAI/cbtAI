<?php
session_start();
require_once "../../server/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $tables = array("admin", "user"); // Tabel admin dan pengguna

    foreach ($tables as $table) {
        $sql = "SELECT id, username, password";
        if ($table === "user") {
            $sql .= ", kelompok, namaLengkap"; // Jika tabel "user", tambahkan kolom "kelompok" ke query
        }
        $sql .= " FROM $table WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $table; // Menyimpan peran pengguna
                if ($table === "user") {
                    $_SESSION["kelompok"] = $row["kelompok"];
                    $_SESSION["nama"] = $row["namaLengkap"]; // Menyimpan kelompok jika tabel "user"
                }

                // Redirect ke halaman dashboard sesuai peran
                switch ($table) {
                    case "admin":
                        header("Location: ../../admin/dashboard.php");
                        break;
                    case "user":
                        header("Location: ../../user/dashboard.php");
                        break;
                    default:
                        header("Location: ../../index.php");
                }

                exit();
            }
        }
    }

    // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan error
    header("Location: ../login.php?error=1");
    exit();
}
?>
