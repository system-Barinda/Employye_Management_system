<?php
require_once "../config/DBConnection.php";
require_once "../users/auth_check.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: list.php");
exit;
