<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Grand Hotel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            /* Using the same background as your admin login */
            background: url('https://cdn.wallpapersafari.com/46/38/j46uNT.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        h1 {
            font-size: 50px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 15px rgba(0,0,0,0.5);
        }

        p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .selection-container {
            display: flex;
            gap: 30px;
        }

        .choice-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            width: 200px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-decoration: none;
            color: white;
            transition: 0.3s ease;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .choice-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
            border-color: #00c3ff;
        }

        .icon {
            font-size: 50px;
            margin-bottom: 15px;
            display: block;
        }

        .choice-card h3 {
            margin: 0;
            font-size: 22px;
        }
    </style>
</head>
<body>

<div class="overlay"></div>

<div class="content">
    <h1>Welcome to Grand Hotel</h1>
    <p>Please select your portal to continue</p>

    <div class="selection-container">
        <a href="customer/index.php" class="choice-card">
            <span class="icon">🛌</span>
            <h3>Customer</h3>
        </a>

        <a href="admin/login.php" class="choice-card">
            <span class="icon">👨‍💼</span>
            <h3>Admin</h3>
        </a>
    </div>
</div>

</body>
</html>