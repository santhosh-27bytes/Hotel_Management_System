<?php
include '../db.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room - Hotel Admin</title>
    <style>
        /* Matches your View Bookings and Payment pages */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f0c29; 
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        /* Glassmorphism Card */
        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            text-align: center;
            position: relative;
        }

        /* Back Button Style */
        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: 0.3s;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-3px);
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 30px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        /* Form Inputs */
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        select, input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: white;
            outline: none;
            box-sizing: border-box; /* Ensures padding doesn't break width */
        }

        select option {
            background: #24243e;
            color: white;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Submit Button */
        .btn-add {
            width: 100%;
            padding: 14px;
            background: #00c3ff;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 195, 255, 0.3);
        }

        .btn-add:hover {
            background: #008fbb;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 195, 255, 0.4);
        }
    </style>
</head>
<body>

<div class="card">
    <a href="index.php" class="back-link">← Back</a>

    <h2>➕ Add New Room</h2>

    <form action="process_add_room.php" method="POST">
        <label>Room Category</label>
        <select name="room_type" required>
            <option value="" disabled selected>Select Room Type</option>
            <option value="AC">AC Room</option>
            <option value="Non-AC">Non-AC Room</option>
            <option value="Deluxe">Deluxe Suite</option>
            <option value="Small">Small Room</option>
            <option value="Big">Big Room</option>
            <option value="Medium">Medium Room</option>
        </select>

        <label>Nightly Price ($)</label>
        <input type="number" name="price" placeholder="e.g. 500" required>

        <button type="submit" name="submit" class="btn-add">Confirm & Add Room</button>
    </form>
</div>

</body>
</html>