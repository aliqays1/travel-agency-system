<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];

if ($user_type === 'admin') {
    $userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
    $packageCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM packages"))['total'];
    $bookingCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"))['total'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Travel Agency</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Travel Agency</h2>

        <a href="dashboard.php">Dashboard</a>

        <?php if ($user_type === 'admin') { ?>
            <a href="admin/users.php">Manage Users</a>
            <a href="admin/add_package.php">Add Package</a>
            <a href="admin/view_packages.php">View Packages</a>
            <a href="admin/view_bookings.php">View Bookings</a>
        <?php } else { ?>
            <a href="user_packages.php">Book Trip</a>
            <a href="user_bookings.php">My Bookings</a>
        <?php } ?>

        <a href="logout.php" class="logout-link">Logout</a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h1>Welcome, <?php echo $username; ?> 👋</h1>
        <p>Role: <?php echo $user_type; ?></p>

        <?php if ($user_type === 'admin') { ?>

            <!-- ADMIN DASHBOARD CARDS -->
            <div class="stats-cards">
                <div class="card">Users<br><strong><?php echo $userCount; ?></strong></div>
                <div class="card">Packages<br><strong><?php echo $packageCount; ?></strong></div>
                <div class="card">Bookings<br><strong><?php echo $bookingCount; ?></strong></div>
            </div>

        <?php } else { ?>

            <!-- USER DASHBOARD = SHOW PACKAGES + SEARCH -->
            <h1>Available Travel Packages</h1>

            <!-- SEARCH BAR -->
            <form method="GET" style="margin: 15px 0; max-width: 320px;">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search destination, location, price..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                    style="
                        width: 100%;
                        padding: 10px 14px;
                        border-radius: 10px;
                        border: 1px solid #ccc;
                        outline: none;
                        font-size: 14px;
                    "
                >
            </form>

            <?php
            $search = "";

            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
            }

            $result = mysqli_query($conn, "
                SELECT * FROM packages 
                WHERE title LIKE '%$search%' 
                   OR location LIKE '%$search%' 
                   OR price LIKE '%$search%'
                ORDER BY id DESC
            ");
            ?>

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

        <?php } ?>

    </div>
</div>
            <?php include 'includes/footer.php'; ?>
</body>
</html>
