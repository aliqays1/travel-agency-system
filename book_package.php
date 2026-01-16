<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['confirm_booking'])) {

    $user_id = $_SESSION['user_id'];
    $package_id = $_POST['package_id'];
    $travel_date = $_POST['travel_date'];
    $people = $_POST['people'];
    $flight_type = $_POST['flight_type'];

$status = 'Pending';
$query = "INSERT INTO bookings (user_id, package_id, travel_date, people, flight_type, status)
          VALUES ('$user_id', '$package_id', '$travel_date', '$people', '$flight_type', '$status')";


    mysqli_query($conn, $query);

    header("Location: user_packages.php?success=1");
    exit();
}
?>
