<?php
require_once "../config/session.php";

$rememberedUser = $_COOKIE['remember_username'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (isset($_GET['error'])): ?>
<p style="color:red;">Invalid username or password</p>
<?php endif; ?>

<form method="POST" action="login_process.php">
    <label>Username</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($rememberedUser) ?>" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
