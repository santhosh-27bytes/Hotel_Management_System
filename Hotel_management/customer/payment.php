<?php
include '../db.php';

$msg = "";

// PAYMENT LOGIC
if(isset($_POST['pay'])){
    // Make sure these variable names match your form names below
    $booking = $_POST['booking']; 
    $amount = $_POST['amount'];

    $insert = $conn->query("INSERT INTO payments(booking_id, amount, payment_date)
                            VALUES('$booking', '$amount', CURDATE())");

    if($insert){
        $msg = "✅ Payment Successful!";
    } else {
        $msg = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="navbar">
    💰 Payment
</div>

<div class="card">

<h2>Make Payment</h2>

<p style="color:lightgreen;"><?php echo $msg; ?></p>

<form method="POST">

<select name="booking" required>
<option value="">Select Booking</option>

<?php
$res = $conn->query("
SELECT b.booking_id, c.name, r.room_type 
FROM bookings b
JOIN customers c ON b.customer_id = c.customer_id
JOIN rooms r ON b.room_id = r.room_id
");

while($row = $res->fetch_assoc()){
    echo "<option value='{$row['booking_id']}'>
    Booking #{$row['booking_id']} - {$row['name']} ({$row['room_type']})
    </option>";
}
?>
</select>

<input name="amount" placeholder="Enter Amount" required>

<button name="pay">Pay Now</button>

<a href="index.php" style="display: block; text-align: center; margin-top: 15px; color: #00d4ff; text-decoration: none; font-size: 14px; font-weight: bold;">
    ⬅️ Go Back
</a>

</form>

</div>

</body>
</html>