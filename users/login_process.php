<?php
require_once "../config/DBConnection.php";
require_once "../config/session.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {

    // Login success
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // Remember Me
    if (isset($_POST['remember'])) {
        setcookie(
            "remember_username",
            $user['username'],
            time() + (7 * 24 * 60 * 60),
            "/",
            "",
            false,
            true
        );
    } else {
        setcookie("remember_username", "", time() - 3600, "/");
    }

    header("Location: dashboard.php");
    exit;

} else {
    header("Location: login.php?error=1");
    exit;
}
