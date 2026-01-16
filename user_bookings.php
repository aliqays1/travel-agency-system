<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "
SELECT 
    bookings.id,
    packages.title,
    packages.location,
    bookings.travel_date,
    bookings.people,
    bookings.flight_type,
    bookings.status
FROM bookings
JOIN packages ON bookings.package_id = packages.id
WHERE bookings.user_id = '$user_id'
AND (
    packages.title LIKE '%$search%' OR
    packages.location LIKE '%$search%' OR
    bookings.status LIKE '%$search%'
)
ORDER BY bookings.id DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Travel Agency</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="user_packages.php">Book Trip</a>
        <a href="user_bookings.php" class="active">My Bookings</a>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h1>My Bookings</h1>

        <!-- SEARCH BAR -->
        <form method="GET" style="margin-bottom:20px; max-width:300px;">
            <input 
                type="text" 
                name="search" 
                placeholder="Search by package, location, status..."
                value="<?php echo htmlspecialchars($search); ?>"
                style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
            >
        </form>

        <table class="styled-table">
            <tr>
                <th>ID</th>
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
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['travel_date']; ?></td>
                    <td><?php echo $row['people']; ?></td>
                    <td><?php echo $row['flight_type']; ?></td>

                    <!-- STATUS WITH COLOR -->
                    <td>
                        <?php
                        if ($row['status'] == 'Approved') {
                            echo "<span style='color:green;font-weight:600;'>Approved</span>";
                        } elseif ($row['status'] == 'Cancelled') {
                            echo "<span style='color:red;font-weight:600;'>Cancelled</span>";
                        } else {
                            echo "<span style='color:orange;font-weight:600;'>Pending</span>";
                        }
                        ?>
                    </td>

                    <!-- ACTION -->
                    <td>
                        <?php if ($row['status'] === 'Pending') { ?>
                            <a 
                                href="cancel_user_booking.php?id=<?php echo $row['id']; ?>" 
                                class="delete-btn"
                                onclick="return confirm('Are you sure you want to cancel this booking?');"
                            >
                                Cancel
                            </a>
                        <?php } else { ?>
                            <span style="color:gray;">No Action</span>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>
