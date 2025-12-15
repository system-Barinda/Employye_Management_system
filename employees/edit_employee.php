<?php
require_once "../config/DBConnection.php";
require_once "../users/auth_check.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>

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
            text-align: center;
            margin-bottom: 20px;
            color: #333;
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
            background: #007bff;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #0069d9;
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
    <h2>Edit Employee</h2>

    <form method="POST" action="edit_employee_process.php">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">

        <label>Employee Name</label>
        <input type="text" name="employee_name"
               value="<?= htmlspecialchars($employee['employee_name']) ?>" required>

        <label>Email</label>
        <input type="email" name="email"
               value="<?= htmlspecialchars($employee['email']) ?>" required>

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?= htmlspecialchars($employee['phone']) ?>">

        <label>Position</label>
        <input type="text" name="position"
               value="<?= htmlspecialchars($employee['position']) ?>">

        <label>Address</label>
        <textarea name="address"><?= htmlspecialchars($employee['address']) ?></textarea>

        <div class="actions">
            <button type="submit">Update Employee</button>
            <a href="list.php" class="back-link">⬅ Back</a>
        </div>
    </form>
</div>

</body>
</html>
