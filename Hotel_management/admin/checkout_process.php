<?php
include '../db.php';

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // 1. Delete the payment associated with this booking first
    // This removes the "Foreign Key" restriction
    $sql_payment = "DELETE FROM payments WHERE booking_id = $booking_id";
    $conn->query($sql_payment);

    // 2. Now delete the booking record
    $sql_booking = "DELETE FROM bookings WHERE booking_id = $booking_id";

    if ($conn->query($sql_booking) === TRUE) {
        // Redirect back to view bookings
        header("Location: view_bookings.php?status=checkedout");
        exit();
    } else {
        echo "Error during checkout: " . $conn->error;
    }
} else {
    header("Location: view_bookings.php");
    exit();
}
?>