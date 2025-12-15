<?php
require_once "auth_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: #f4f6f8;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #007bff;
            color: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 20px;
        }

        .logout {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            background: rgba(255,255,255,0.2);
            padding: 8px 14px;
            border-radius: 4px;
        }

        .logout:hover {
            background: rgba(255,255,255,0.3);
        }

        /* Main Content */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            color: #333;
            margin-bottom: 5px;
        }

        .welcome p {
            color: #666;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .card a {
            display: inline-block;
            padding: 10px 16px;
            background: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .card a:hover {
            background: #218838;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            color: #999;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .header h1 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

<header class="header">
    <h1>Employee Management System</h1>
    <a href="logout.php" class="logout">Logout</a>
</header>

<div class="container">
    <div class="welcome">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h2>
        <p>Manage your employees efficiently from the dashboard.</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Employees</h3>
            <p>View, add, edit, or delete employee records.</p>
            <a href="../employees/list.php">Manage Employees</a>
        </div>

        <!-- Future cards -->
        <div class="card">
            <h3>Reports</h3>
            <p>View employee reports (coming soon).</p>
            <a href="#" onclick="return false;">Coming Soon</a>
        </div>

        <div class="card">
            <h3>Settings</h3>
            <p>System configuration and preferences.</p>
            <a href="#" onclick="return false;">Coming Soon</a>
        </div>
    </div>
</div>

<footer>
    © <?= date('Y') ?> Employee Management System
</footer>

</body>
</html>
