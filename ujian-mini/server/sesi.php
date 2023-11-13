<?php
session_start();
require_once "koneksi.php";

function checkRoleAccess($allowed_roles) {
    if (!isset($_SESSION['nama'])) {
        header("Location: ../index.php");
        exit();
    }

    if (!in_array($_SESSION['role'], $allowed_roles)) {
        header("Location: ../../403.php"); // Ganti dengan halaman yang sesuai
        exit();
    }
}

?>