<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="sidebar">
    <h2>Travel Agency</h2>

    <a href="dashboard.php">Dashboard</a>

    <?php if ($_SESSION['user_type'] === 'admin') { ?>
        <a href="admin/users.php">Manage Users</a>
        <a href="admin/add_package.php">Add Package</a>
        <a href="admin/view_packages.php">View Packages</a>
        <a href="admin/view_bookings.php">View Bookings</a>
    <?php } ?>

    <?php if ($_SESSION['user_type'] === 'user') { ?>
        <a href="user_packages.php">Book Trip</a>
        <a href="user_bookings.php">My Bookings</a>
    <?php } ?>

    <a href="logout.php" class="logout-link">Logout</a>
</div>
