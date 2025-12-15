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
</head>
<body>

<h2>Employees</h2>

<a href="add_employee.php">➕ Add New Employee</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Position</th>
        <th>Address</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <?php foreach ($employees as $emp): ?>
    <tr>
        <td><?= htmlspecialchars($emp['employee_name']) ?></td>
        <td><?= htmlspecialchars($emp['email']) ?></td>
        <td><?= htmlspecialchars($emp['phone']) ?></td>
        <td><?= htmlspecialchars($emp['position']) ?></td>
        <td><?= htmlspecialchars($emp['address']) ?></td>
        <td><?= $emp['created_at'] ?></td>
        <td>
            <a href="edit_employee.php?id=<?= $emp['id'] ?>">✏ Edit</a> |
            <a href="delete_employee.php?id=<?= $emp['id'] ?>"
               onclick="return confirm('Are you sure you want to delete this employee?');">
               🗑 Delete
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="../dashboard.php">⬅ Back</a>

</body>
</html>
