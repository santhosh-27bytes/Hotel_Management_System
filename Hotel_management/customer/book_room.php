<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../db.php';

$msg = "";

if(isset($_POST['submit'])){
    $customer_id = $_POST['customer'];
    $room_id = $_POST['room'];
    $check_in = $_POST['in'];
    $check_out = $_POST['out'];

    // 1. Insert the booking record
    $sql = "INSERT INTO bookings (customer_id, room_id, check_in, check_out) 
            VALUES ('$customer_id', '$room_id', '$check_in', '$check_out')";

    if($conn->query($sql)){
        // 2. Automatically update the room status to 'booked' so it disappears from this list
        $conn->query("UPDATE rooms SET status='booked' WHERE room_id='$room_id'");
        $msg = "✅ Room Booked Successfully!";
    } else {
        $msg = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="navbar">
    🏨 Book Room
</div>

<div class="card">
    <h2>📅 Book Room</h2>

    <?php if($msg != ""): ?>
        <p style="color:lightgreen; font-weight:bold;"><?php echo $msg; ?></p>
    <?php endif; ?>

    <form method="POST">
        <select name="customer" required>
            <option value="">Select Customer</option>
            <?php
            $res_cust = $conn->query("SELECT * FROM customers");
            while($row = $res_cust->fetch_assoc()){
                echo "<option value='{$row['customer_id']}'>{$row['name']}</option>";
            }
            ?>
        </select>

        <select name="room" required>
            <option value="">Select Room</option>
            <?php
            // Only show rooms that the admin added and are currently 'available'
            $res_room = $conn->query("SELECT * FROM rooms WHERE status='available'");
            
            if($res_room->num_rows > 0){
                while($row = $res_room->fetch_assoc()){
                    echo "<option value='{$row['room_id']}'>
                            {$row['room_type']} - ₹{$row['price']}
                          </option>";
                }
            } else {
                echo "<option value=''>No Available Rooms Found</option>";
            }
            ?>
        </select>

        <label style="color:white; font-size:12px; display:block; text-align:left; margin-left:10%; margin-top:10px;">Check-In Date:</label>
        <input type="date" name="in" required>

        <label style="color:white; font-size:12px; display:block; text-align:left; margin-left:10%; margin-top:10px;">Check-Out Date:</label>
        <input type="date" name="out" required>

        <button type="submit" name="submit">Book Room</button>

        <a href="index.php" style="display: block; text-align: center; margin-top: 15px; color: #00d4ff; text-decoration: none; font-size: 14px; font-weight: bold;">
            ⬅️ Back to Dashboard
        </a>
    </form>
</div>

</body>
</html>