<?php
session_start();
// Security: Redirect to login page if the admin is not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Hotel Management</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('https://cdn.wallpapersafari.com/46/38/j46uNT.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            position: relative;
        }

        /* Logout Button in Navbar */
        .logout-btn {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            background: #ff4757;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ff6b81;
        }

        .welcome-text {
            color: white;
            font-size: 48px;
            margin-top: 80px;
            text-shadow: 3px 3px 15px rgba(0,0,0,0.7);
            font-weight: bold;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 40px;
            width: 320px;
        }

        .btn {
            padding: 18px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background: #00c3ff;
            border-radius: 12px;
            text-align: center;
            transition: 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: bold;
        }

        .btn:hover {
            background: #008fbb;
            transform: scale(1.03);
        }

        .btn-orange { background: #ff9f43; }
        .btn-orange:hover { background: #e67e22; }

        .btn-green { background: #2ecc71; }
        .btn-green:hover { background: #27ae60; }
    </style>
</head>
<body>

<div class="navbar">
    👨‍💼 Admin Panel
    <a href="logout.php" class="logout-btn">Logout 🚪</a>
</div>

<h1 class="welcome-text">Welcome Admin</h1>

<div class="menu-container">
    <a href="add_room.php" class="btn">➕ Add Room</a>
    <a href="view_bookings.php" class="btn">📋 View Bookings</a>
    <a href="customer_details.php" class="btn">👥 Customer Details</a>
    <a href="room_status.php" class="btn btn-orange">🏨 Room Status (Live)</a>
    <a href="payment_details.php" class="btn btn-green">💰 Payment Details</a>
</div>

</body>
</html>