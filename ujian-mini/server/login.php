<?php 
require('sesi.php'); 
require('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM pengguna WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            if ($row['role'] === 'admin') {
                header("Location: ../admin/dashboard.php");
            } else if ($row['role'] === 'user') {
                header("Location: ../user/dashboard.php");
            } else {
                header("Location: ../../index.php");
            }
            exit;
        } else {
            $_SESSION['login_attempts'] = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] + 1 : 1;

            if ($_SESSION['login_attempts'] >= 3) {
                header("Location: blok.php");
                exit;
            }
        }
    }
}

header("Location: ../selamat-datang/index.php?error=1");
?>