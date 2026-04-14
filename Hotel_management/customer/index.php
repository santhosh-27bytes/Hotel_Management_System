<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Portal | Hotel Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            margin: 0;
            display: flex;
            background: url('https://cdn.wallpapersafari.com/46/38/j46uNT.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            font-family: 'Inter', sans-serif;
            color: #333;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 260px;
            background: #1a252fde; /* Dark Professional Blue/Gray */
            color: white;
            position: fixed;
            height: 100vh;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar h2 {
            text-align: center;
            font-size: 18px;
            color: #00acee;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: #bdc3c7;
            text-decoration: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #6e869e25;
            color: #00acee;
            padding-left: 35px;
        }

        /* Content Area */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 250px);
            padding: 40px;
        }

        .welcome-banner {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .welcome-banner h1 { margin: 0; color: #2c3e50; }
        .welcome-banner p { color: #7f8c8d; margin-top: 10px; }

        /* Quick Action Cards */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #eee;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .icon { font-size: 40px; display: block; margin-bottom: 10px; }
        .action-card h3 { margin: 10px 0; color: #2c3e50; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>🏨 Guest Menu</h2>
    <a href="index.php">🏠 Dashboard</a>
    <a href="register.php">📝 Register Account</a>
    <a href="book_room.php">📅 Book a Room</a>
    <a href="payment.php">💰 My Payments</a>
    </br>
        </br>

            </br>

                </br>
                    </br>

                        </br>

                            </br>

                                </br>

                                    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>


    <a href="../index.php" style="margin-top: 50px; color: #e74c3c;">⬅️ Exit Portal</a>
</div>

<div class="main-content">
    <div class="welcome-banner">
        <h1>👋 Welcome to our Hotel</h1>
        <p>Manage your stay, book new rooms, and handle payments all in one place.</p>
    </div>

    <div class="action-grid">
        <a href="register.php" class="action-card">
            <span class="icon">📝</span>
            <h3>Register</h3>
            <p>Create your guest profile</p>
        </a>

        <a href="book_room.php" class="action-card">
            <span class="icon">📅</span>
            <h3>Book Room</h3>
            <p>Browse available suites</p>
        </a>

        <a href="payment.php" class="action-card">
            <span class="icon">💰</span>
            <h3>Payments</h3>
            <p>View and settle bills</p>
        </a>
    </div>
</div>

</body>
</html>