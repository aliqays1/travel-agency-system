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

$result = mysqli_query($conn, "SELECT * FROM packages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Travel Packages</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Travel Agency</h2>
        <a href="../dashboard.php">Dashboard</a>
        <a href="users.php">Manage Users</a>
        <a href="add_package.php">Add Package</a>
        <a href="view_packages.php" class="active">View Packages</a>
        <a href="view_bookings.php">View Bookings</a>
        <a href="../logout.php" class="logout-link">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h1>All Travel Packages</h1>

        <table class="styled-table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td>
                        <img src="../uploads/<?php echo $row['image']; ?>" 
                             style="width:70px; height:70px; object-fit:cover; border-radius:8px;">
                    </td>
                    <td>
                        <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                        <a href="delete_package.php?id=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>
