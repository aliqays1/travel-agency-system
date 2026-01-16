<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: user_bookings.php");
    exit();
}

$booking_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Security: only cancel own booking
$query = "UPDATE bookings 
          SET status = 'Cancelled' 
          WHERE id = '$booking_id' AND user_id = '$user_id'";

mysqli_query($conn, $query);

header("Location: user_bookings.php");
exit();
