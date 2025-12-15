<?php
require_once "../config/DBConnection.php";
require_once "../users/auth_check.php";

$stmt = $pdo->query("SELECT * FROM employees ORDER BY created_at DESC");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>

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

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
        }

        .btn-add {
            background: #28a745;
            color: #fff;
        }

        .btn-back {
            background: #6c757d;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #007bff;
            color: #fff;
            text-align: left;
            padding: 10px;
            font-size: 14px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .actions a {
            text-decoration: none;
            margin-right: 6px;
            font-size: 13px;
        }

        .edit {
            color: #007bff;
        }

        .delete {
            color: #dc3545;
        }

        /* ===== Responsive Table ===== */
        @media (max-width: 768px) {

            table, thead, tbody, th, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                background: #fff;
                border-radius: 6px;
                padding: 10px;
                box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 8px 0;
                border: none;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #555;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Employees</h2>

    <div class="top-bar">
        <a href="add_employee.php" class="btn btn-add">➕ Add New Employee</a>
        <a href="../users/dashboard.php" class="btn btn-back">⬅ Back</a>
        <a href="../users/logout.php" class="btn btn-back"> logout</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Address</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($employees as $emp): ?>
            <tr>
                <td data-label="Name"><?= htmlspecialchars($emp['employee_name']) ?></td>
                <td data-label="Email"><?= htmlspecialchars($emp['email']) ?></td>
                <td data-label="Phone"><?= htmlspecialchars($emp['phone']) ?></td>
                <td data-label="Position"><?= htmlspecialchars($emp['position']) ?></td>
                <td data-label="Address"><?= htmlspecialchars($emp['address']) ?></td>
                <td data-label="Created"><?= $emp['created_at'] ?></td>
                <td data-label="Action" class="actions">
                    <a href="edit_employee.php?id=<?= $emp['id'] ?>" class="edit">✏ Edit</a>
                    <a href="delete_employee.php?id=<?= $emp['id'] ?>"
                       class="delete"
                       onclick="return confirm('Are you sure you want to delete this employee?');">
                       🗑 Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
