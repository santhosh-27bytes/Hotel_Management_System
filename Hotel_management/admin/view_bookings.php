<?php
include '../db.php';
?>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #0f0c29; color: white; display: flex; flex-direction: column; align-items: center; }
        .container { width: 90%; max-width: 1000px; margin-top: 50px; }
        .btn-back { text-decoration: none; color: white; background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 8px; display: inline-block; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 15px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { background: rgba(0, 0, 0, 0.5); text-transform: uppercase; font-size: 13px; }
        
        /* Checkout Button Style */
        .btn-checkout {
            background: #e74c3c;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-checkout:hover { background: #c0392b; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="btn-back">← Back</a>
    <h2>📋 Current Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer ID</th>
                <th>Room ID</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM bookings");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                        <td>#{$row['booking_id']}</td>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['room_id']}</td>
                        <td>{$row['check_in']}</td>
                        <td>{$row['check_out']}</td>
                        <td>
                            <a href='checkout_process.php?id={$row['booking_id']}' 
                               class='btn-checkout' 
                               onclick=\"return confirm('Confirm Customer Checkout? This will free up the room.')\">
                               Check Out
                            </a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No active bookings.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>