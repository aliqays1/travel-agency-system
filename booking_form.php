<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: user_packages.php");
    exit();
}

$package_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM packages WHERE id = $package_id");

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: user_packages.php");
    exit();
}

$package = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Package</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .booking-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            padding: 40px 20px;
        }

        .booking-box {
            width: 100%;
            max-width: 520px;
            background: white;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            animation: fadeUp 0.6s ease;
        }

        @keyframes fadeUp {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .booking-box h1 {
            font-size: 26px;
            margin-bottom: 8px;
            color: #111827;
        }

        .booking-box h1 span {
            color: #2563eb;
        }

        .booking-sub {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #374151;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            outline: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .confirm-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .confirm-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,0.3);
        }

        .package-badge {
            display: inline-block;
            background: #e0e7ff;
            color: #3730a3;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 14px;
        }
    </style>
</head>
<body>

<div class="booking-page">

    <div class="booking-box">

        <div class="package-badge">✈️ Travel Package</div>

        <h1>
            Book: <span><?php echo $package['title']; ?></span>  
            (<?php echo $package['location']; ?>)
        </h1>

        <p class="booking-sub">
            Fill in the details below to confirm your trip and secure your seat 🌍
        </p>

        <form method="POST" action="book_package.php">

            <!-- CRITICAL FIX (unchanged) -->
            <input type="hidden" name="package_id" value="<?php echo $package['id']; ?>">

            <div class="input-group">
                <label>Travel Date</label>
                <input type="date" name="travel_date" required>
            </div>

            <div class="input-group">
                <label>Number of People</label>
                <input type="number" name="people" min="1" placeholder="Enter number of people" required>
            </div>

            <div class="input-group">
                <label>Flight Type</label>
                <select name="flight_type" required>
                    <option value="">Select Flight Type</option>
                    <option value="Economy">Economy</option>
                    <option value="Business">Business</option>
                    <option value="First Class">First Class</option>
                </select>
            </div>

            <button type="submit" name="confirm_booking" class="confirm-btn">
                Confirm Booking 🚀
            </button>

        </form>

    </div>

</div>

</body>
</html>
