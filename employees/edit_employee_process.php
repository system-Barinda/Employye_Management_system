<?php
require_once "../config/DBConnection.php";
require_once "../users/auth_check.php";

$id       = $_POST['id'];
$name     = trim($_POST['employee_name']);
$email    = trim($_POST['email']);
$phone    = trim($_POST['phone']);
$position = trim($_POST['position']);
$address  = trim($_POST['address']);

if (empty($name) || empty($email)) {
    header("Location: edit_employee.php?id=$id");
    exit;
}

$stmt = $pdo->prepare("
    UPDATE employees
    SET employee_name = ?, email = ?, phone = ?, position = ?, address = ?
    WHERE id = ?
");

$stmt->execute([$name, $email, $phone, $position, $address, $id]);

header("Location: list.php");
exit;
