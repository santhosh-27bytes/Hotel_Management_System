<?php
include '../db.php';
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
    <title>Customer Details</title>
    <style>
        body {
            margin: 0; font-family: sans-serif;
            background: #1a1a2e; color: white;
            display: flex; flex-direction: column; align-items: center;
        }
        .container { width: 90%; max-width: 900px; margin-top: 50px; }
        .btn-back {
            text-decoration: none; color: white; background: #4e34e1;
            padding: 8px 20px; border-radius: 5px;
        }
        table {
            width: 100%; border-collapse: collapse; margin-top: 20px;
            background: #16213e; border-radius: 8px; overflow: hidden;
        }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #0f3460; }
        th { background: #0f3460; color: #e94560; }
        tr:hover { background: rgba(255,255,255,0.05); }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php" class="btn-back">← Back</a>
    <h2>👥 Customer Directory</h2>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM customers";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['customer_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>No customer records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>