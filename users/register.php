<?php
require_once "../config/session.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #28a745, #6fdc8c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .register-box h2 {
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

        .success {
            background: #e6fff0;
            color: #1e7e34;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success a {
            color: #1e7e34;
            font-weight: bold;
            text-decoration: none;
        }

        .success a:hover {
            text-decoration: underline;
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
            border-color: #28a745;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 400px) {
            .register-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="register-box">
    <h2>Create Account</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="success">
            Account created successfully.
            <a href="../login.php">Login</a>
        </div>
    <?php endif; ?>

    <form method="POST" action="register_process.php">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required minlength="6">

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Register</button>
    </form>

    <div class="footer-text">
        © <?= date('Y') ?> Employee Management System
    </div>
</div>

</body>
</html>
