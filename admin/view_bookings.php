<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$query = "
SELECT 
    bookings.id,
    users.username,
    packages.title,
    packages.location,
    bookings.travel_date,
    bookings.people,
    bookings.flight_type,
    bookings.status
FROM bookings
JOIN users ON bookings.user_id = users.id
JOIN packages ON bookings.package_id = packages.id
ORDER BY bookings.id DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Bookings</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="../dashboard.php">Dashboard</a>
        <a href="users.php">Manage Users</a>
        <a href="add_package.php">Add Package</a>
        <a href="view_packages.php">View Packages</a>
        <a href="view_bookings.php" class="active">View Bookings</a>
        <a href="../logout.php" class="logout-link">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content" style="padding:40px;">

        <h1 style="margin-bottom:20px;">All Bookings</h1>

        <div style="width:100%; overflow-x:auto; background:white; padding:20px; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

            <table class="styled-table" style="width:100%; min-width:1000px;">

                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Package</th>
                    <th>Location</th>
                    <th>Travel Date</th>
                    <th>People</th>
                    <th>Flight Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['travel_date']; ?></td>
                        <td><?php echo $row['people']; ?></td>
                        <td><?php echo $row['flight_type']; ?></td>

                        <!-- STATUS COLUMN -->
                        <td>
                            <?php
                                if ($row['status'] == 'Approved') {
                                    echo "<span style='color:green; font-weight:bold;'>Approved</span>";
                                } elseif ($row['status'] == 'Cancelled') {
                                    echo "<span style='color:red; font-weight:bold;'>Cancelled</span>";
                                } else {
                                    echo "<span style='color:orange; font-weight:bold;'>Pending</span>";
                                }
                            ?>
                        </td>

                        <!-- ACTION COLUMN -->
                        <td style="white-space: nowrap;">
                            <?php if ($row['status'] == 'Pending') { ?>
                                <a href="approve_booking.php?id=<?php echo $row['id']; ?>" class="edit-btn" style="margin-right:8px;">Approve</a>
                                <a href="cancel_booking.php?id=<?php echo $row['id']; ?>" class="delete-btn">Cancel</a>
                            <?php } else { ?>
                                <span style="color:gray;">No Action</span>
                            <?php } ?>
                        </td>

                    </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</div>

</body>
</html>
