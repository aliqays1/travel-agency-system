<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: view_bookings.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "UPDATE bookings SET status='Cancelled' WHERE id='$id'");

header("Location: view_bookings.php");
exit();
