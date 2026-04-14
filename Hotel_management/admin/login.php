<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Hotel Management</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('https://cdn.wallpapersafari.com/46/38/j46uNT.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            width: 350px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: white;
        }

        h2 { margin-bottom: 25px; font-size: 28px; }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-sizing: border-box;
        }

        input::placeholder { color: #ddd; }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #00c3ff;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn-login:hover { background: #008fbb; transform: scale(1.02); }

        .error { color: #ff4757; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>🔐 Admin Login</h2>
    
    <?php if(isset($_GET['error'])) { echo '<p class="error">Invalid Username or Password</p>'; } ?>

    <form action="login_process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login" class="btn-login">Login</button>
    </form>
</div>

</body>
</html>