<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id=$id";
mysqli_query($conn, $query);

header("Location: users.php");
exit();
?>
