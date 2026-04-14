
<!DOCTYPE html>
<html>
<head>
    <title>Register Customer</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="navbar">
    🏨 Hotel Management
</div>

<div class="card">

    <h2>👤 Register Customer</h2>

    <p style="color:lightgreen;"></p>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <textarea name="address" placeholder="Residential Address" rows="2"></textarea>

        <button type="submit" name="submit">Register Customer</button>
    </form>

    <br>
    <a href="index.php" style="color: white; text-decoration: none; font-size: 14px;">⬅️ Back to List</a>

</div>

</body>
</html>