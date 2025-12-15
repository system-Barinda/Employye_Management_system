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
</head>
<body>

<h2>Edit Employee</h2>

<form method="POST" action="edit_employee_process.php">
    <input type="hidden" name="id" value="<?= $employee['id'] ?>">

    <label>Name</label><br>
    <input type="text" name="employee_name"
           value="<?= htmlspecialchars($employee['employee_name']) ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email"
           value="<?= htmlspecialchars($employee['email']) ?>" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone"
           value="<?= htmlspecialchars($employee['phone']) ?>"><br><br>

    <label>Position</label><br>
    <input type="text" name="position"
           value="<?= htmlspecialchars($employee['position']) ?>"><br><br>

    <label>Address</label><br>
    <textarea name="address"><?= htmlspecialchars($employee['address']) ?></textarea><br><br>

    <button type="submit">Update Employee</button>
</form>

<a href="list.php">⬅ Back</a>

</body>
</html>
