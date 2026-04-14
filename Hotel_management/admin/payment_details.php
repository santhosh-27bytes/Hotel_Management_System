<?php
include '../db.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    // If not logged in, kick them back to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Details - Admin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            /* Dark background ensures white text is visible */
            background: #1a1a2e; 
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin-top: 50px;
        }

        .btn-back {
            text-decoration: none;
            color: white;
            background: #4e34e1;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 20px;
            font-weight: bold;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        /* Improved Table Visibility */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #16213e; /* Solid dark blue background */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        th {
            background: #0f3460; /* Darker header */
            color: #e94560; /* Pinkish-red accent for headers */
            text-transform: uppercase;
            padding: 20px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 18px;
            border-bottom: 1px solid #1a1a2e;
            color: #ffffff; /* Forced white color for data */
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .amount {
            color: #2ecc71; /* Green for money */
            font-weight: bold;
        }

        .error-msg {
            color: #ff4757;
            font-size: 12px;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="btn-back">← Back</a>
    <h2>💰 Payment Records</h2>
    
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Amount Paid</th>
                <th>Method</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Using aliases (p, b, c) to make the query cleaner
            $sql = "SELECT p.*, c.name 
                    FROM payments p
                    JOIN bookings b ON p.booking_id = b.booking_id
                    JOIN customers c ON b.customer_id = c.customer_id";
            
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Fix for the 'Undefined array key' error:
                    // We check if the key exists, if not we show 'N/A'
                    $method = isset($row['payment_method']) ? $row['payment_method'] : "Success";
                    
                    echo "<tr>
                            <td>#{$row['payment_id']}</td>
                            <td>#{$row['booking_id']}</td>
                            <td style='color: #00d2ff;'>{$row['name']}</td>
                            <td class='amount'>$" . number_format($row['amount'], 2) . "</td>
                            <td>$method</td>
                            <td>{$row['payment_date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No records found.</td></tr>";
            }
            ?>