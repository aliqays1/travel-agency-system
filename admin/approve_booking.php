<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "UPDATE bookings SET status='Approved' WHERE id=$id");

header("Location: view_bookings.php");
exit();
