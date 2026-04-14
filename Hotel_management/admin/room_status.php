<?php
include '../db.php';

// Check connection
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
    <title>Live Room Status</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f0c29; 
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin-top: 50px;
        }

        .btn-back {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 18px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .available { background: #27ae60; color: white; }
        .booked { background: #e74c3c; color: white; }

        tr:hover {
            background: rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="btn-back">← Back</a>
    <h2>🏨 Live Room Availability</h2>

    <table>
        <thead>
            <tr>
                <th>Room ID</th>
                <th>Type</th>
                <th>Price</th>
                <th>Current Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Logic: Check if room_id is present in the bookings table
            $sql = "SELECT rooms.*, bookings.booking_id 
                    FROM rooms 
                    LEFT JOIN bookings ON rooms.room_id = bookings.room_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Check if there is an active booking ID
                    $isBooked = !empty($row['booking_id']);
                    $statusText = $isBooked ? "Occupied" : "Available";
                    $statusClass = $isBooked ? "booked" : "available";
                    
                    // FIXED: Removed the extra $ sign and corrected concatenation
                    echo "<tr>
                            <td>{$row['room_id']}</td>
                            <td>" . htmlspecialchars($row['room_type']) . "</td>
                            <td>$" . number_format($row['price'], 2) . "</td>
                            <td><span class='status-badge $statusClass'>$statusText</span></td>
                          </tr>";
                }
            } else {
                echo "Total rooms: 0. Please add rooms first.";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>