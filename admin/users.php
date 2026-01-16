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

$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="../dashboard.php">Dashboard</a>
        <a href="users.php" class="active">Manage Users</a>
        <a href="add_package.php">Add Package</a>
        <a href="view_packages.php">View Packages</a>
        <a href="view_bookings.php">View Bookings</a>
        <a href="../logout.php" class="logout-link">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content" style="padding:40px;">

        <h1 style="margin-bottom:20px;">All Users</h1>

        <div style="width:100%; overflow-x:auto; background:white; padding:20px; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

            <table class="styled-table" style="width:100%; min-width:900px;">

                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <?php 
                                if ($row['user_type'] === 'admin') {
                                    echo "<span style='color:#2563eb; font-weight:600;'>Admin</span>";
                                } else {
                                    echo "<span style='color:#16a34a; font-weight:600;'>User</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($row['user_status'] === 'active') {
                                    echo "<span style='color:green; font-weight:bold;'>Active</span>";
                                } else {
                                    echo "<span style='color:red; font-weight:bold;'>Inactive</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>" 
                               class="delete-btn"
                               onclick="return confirm('Are you sure you want to delete this user?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>

        </div>

    </div>

</div>

</body>
</html>
