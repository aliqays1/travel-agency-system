<?php
session_start();
include 'db.php';

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users 
              WHERE username='$username' 
              AND password='$password' 
              AND user_status='active'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Travel Agency</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .remember-wrapper {
            margin: 10px 0 20px 0;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-card">

        <h2>Login</h2>

        <?php if ($error != "") { ?>
            <p style="color:red; text-align:center;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST">

            <input type="text" name="username" placeholder="Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <!-- FIXED REMEMBER ME -->
            <div class="remember-wrapper">
                <label class="remember-label">
                    <input type="checkbox" name="remember">
                    <span>Remember Me</span>
                </label>
            </div>

            <div class="btn-group">
                <button type="submit" name="login" class="btn-submit">Login</button>
            </div>

            <p style="text-align:center; margin-top:15px;">
                Don’t have an account? <a href="register.php">Register</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>
