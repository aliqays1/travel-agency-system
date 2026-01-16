<?php
include 'db.php';

if (isset($_POST['register'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $user_status = $_POST['user_status'];

    // Upload profile picture
    $profile_picture = $_FILES['profile_picture']['name'];
    $tmp_name = $_FILES['profile_picture']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $profile_picture);

    // Insert into database
    $query = "INSERT INTO users (first_name, last_name, sex, username, password, phone, email, profile_picture, user_type, user_status)
              VALUES ('$first_name', '$last_name', '$sex', '$username', '$password', '$phone', '$email', '$profile_picture', '$user_type', '$user_status')";

    mysqli_query($conn, $query);

    echo "<script>alert('Registration successful!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration - Travel Agency</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="register-container">
    <div class="register-card">
        <h2>User Registration</h2>

        <form method="POST" enctype="multipart/form-data">

    <input type="text" name="first_name" placeholder="First Name" required><br><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br><br>

    <select name="sex" required>
        <option value="">Select Sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>

    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="text" name="phone" placeholder="Phone" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="file" name="profile_picture" required><br><br>

    <select name="user_type" required>
        <option value="">Select User Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br><br>

    <select name="user_status" required>
        <option value="">Select User Status</option>
        <option value="active">Active</option>
        <option value="not active">Not Active</option>
    </select><br><br>

               <div class="btn-group">
                <button type="reset" class="btn-reset">Reset</button>
                <button type="submit" name="register" class="btn-submit">Register</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
