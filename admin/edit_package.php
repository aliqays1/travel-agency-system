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

if (!isset($_GET['id'])) {
    header("Location: view_packages.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM packages WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: view_packages.php");
    exit();
}

$package = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    mysqli_query($conn, "UPDATE packages SET title='$title', location='$location', price='$price' WHERE id=$id");

    header("Location: view_packages.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Package</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="../dashboard.php">Dashboard</a>
        <a href="users.php">Manage Users</a>
        <a href="add_package.php">Add Package</a>
        <a href="view_packages.php">View Packages</a>
        <a href="../logout.php" class="logout-link">Logout</a>
    </div>

    <div class="main-content">
        <div class="form-card">
            <h2>Edit Travel Package</h2>

            <form method="POST">
                <input type="text" name="title" value="<?php echo $package['title']; ?>" required>
                <input type="text" name="location" value="<?php echo $package['location']; ?>" required>
                <input type="number" name="price" value="<?php echo $package['price']; ?>" required>

                <button type="submit" name="update" class="btn-submit">Update Package</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
