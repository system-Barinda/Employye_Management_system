<?php
require_once "../config/DBConnection.php";
require_once "../config/session.php";

// Collect input
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm_password'] ?? '';

// Validate input
if (empty($username) || empty($password) || empty($confirm)) {
    header("Location: register.php?error=All fields are required");
    exit;
}

if ($password !== $confirm) {
    header("Location: register.php?error=Passwords do not match");
    exit;
}

if (strlen($password) < 6) {
    header("Location: register.php?error=Password must be at least 6 characters");
    exit;
}

// Check if username already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);

if ($stmt->fetch()) {
    header("Location: register.php?error=Username already exists");
    exit;
}

// Hash password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user (created_at is automatic)
$stmt = $pdo->prepare("
    INSERT INTO users (username, password)
    VALUES (?, ?)
");

$stmt->execute([$username, $hashedPassword]);

header("Location: login.php");
exit;
