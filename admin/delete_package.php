<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['user_type'] !== 'admin') {
    header("Location: ../dashboard.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM packages WHERE id = $id");
}

header("Location: view_packages.php");
exit();
?>
