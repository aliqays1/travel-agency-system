<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM packages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Travel Packages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Travel Agency</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="user_packages.php" class="active">Book Trip</a>
        <a href="user_bookings.php">My Bookings</a>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h1>Available Travel Packages</h1>

        <?php if (isset($_GET['success'])) { ?>
            <div style="
                background:#d1fae5;
                color:#065f46;
                padding:14px;
                margin-bottom:20px;
                border-radius:10px;
                font-weight:bold;
            ">
                ✅ Booking successful! Your reservation has been recorded.
            </div>
        <?php } ?>

        <table class="styled-table">
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td>
                        <img src="uploads/<?php echo $row['image']; ?>" 
                             style="width:70px; height:70px; object-fit:cover; border-radius:8px;">
                    </td>
                    <td>
                        <a href="booking_form.php?id=<?php echo $row['id']; ?>" class="book-btn">Book Now</a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>
