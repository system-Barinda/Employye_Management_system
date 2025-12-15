<?php
require_once "../config/session.php";

$rememberedUser = $_COOKIE['remember_username'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            width: 100%;
            max-width: 380px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .error {
            background: #ffe5e5;
            color: #b30000;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .remember {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .remember input {
            margin-right: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 400px) {
            .login-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Employee Login</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="error">Invalid username or password</div>
    <?php endif; ?>

    <form method="POST" action="login_process.php">
        <label>Username</label>
        <input type="text" name="username"
               value="<?= htmlspecialchars($rememberedUser) ?>" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <div class="remember">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="footer-text">
        © <?= date('Y') ?> Employee Management System
    </div>
</div>

</body>
</html>
