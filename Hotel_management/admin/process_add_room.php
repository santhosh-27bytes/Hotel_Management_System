<?php
// Database Connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "hotel"; 

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the button was clicked
if (isset($_POST['add_room'])) {
    
    // Use the names from your form inputs
    // Assuming your <select> is name="room_type" and <input> is name="price"
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $price     = mysqli_real_escape_string($conn, $_POST['price']);
    $status    = "Available";

    // Since your screenshot doesn't show a Room Number input, 
    // we will generate a random one or you can add a field for it.
    $room_number = "R-" . rand(100, 999); 

    $sql = "INSERT INTO rooms (room_number, room_type, price, status) 
            VALUES ('$room_number', '$room_type', '$price', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Room Added Successfully!');
                window.location.href='add_room.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>