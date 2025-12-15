<?php
require_once "../config/DBConnection.php";
require_once "../config/session.php";
require_once "../users/auth_check.php";

// Collect input
$name     = trim($_POST['employee_name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$position = trim($_POST['position'] ?? '');
$address  = trim($_POST['address'] ?? '');

// Validation
if (empty($name) || empty($email)) {
    header("Location: add_employee.php?error=Name and email are required");
    exit;
}

// Check duplicate email
$stmt = $pdo->prepare("SELECT id FROM employees WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    header("Location: add_employee.php?error=Employee email already exists");
    exit;
}

// Insert
$stmt = $pdo->prepare("
    INSERT INTO employees (employee_name, email, phone, position, address)
    VALUES (?, ?, ?, ?, ?)
");

$stmt->execute([$name, $email, $phone, $position, $address]);

header("Location: add_employee.php?success=1");
exit;
