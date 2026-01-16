<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['add_package'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "../uploads/" . $image_name);

    $query = "INSERT INTO packages (title, description, price, location, image) 
              VALUES ('$title', '$description', '$price', '$location', '$image_name')";
    mysqli_query($conn, $query);

    header("Location: view_packages.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
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
        <h1>Add Travel Package</h1>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="title" placeholder="Package Title" required>

            <textarea name="description" placeholder="Description" required></textarea>

            <input type="text" name="location" placeholder="Location" required>

            <input type="number" name="price" placeholder="Price" required>

            <input type="file" name="image" required>

            <button type="submit" name="add_package" class="btn-submit">Add Package</button>

        </form>
    </div>

</div>


</div>

</body>
</html>
