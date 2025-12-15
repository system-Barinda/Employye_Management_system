<?php
require_once "../config/session.php";
require_once "../users/auth_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .message {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        button {
            background: #28a745;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #218838;
        }

        .back-link {
            text-decoration: none;
            color: #6c757d;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Add Employee</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="message error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="message success">Employee added successfully</div>
    <?php endif; ?>

    <form method="POST" action="add_employee_process.php">

        <label>Employee Name</label>
        <input type="text" name="employee_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone</label>
        <input type="text" name="phone">

        <label>Position</label>
        <input type="text" name="position">

        <label>Address</label>
        <textarea name="address"></textarea>

        <div class="actions">
            <button type="submit">Save Employee</button>
            <a href="../dashboard.php" class="back-link">⬅ Back</a>
        </div>
    </form>
</div>

</body>
</html>
