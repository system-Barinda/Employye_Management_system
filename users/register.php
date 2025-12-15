<?php
require_once "../config/session.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<h2>Register</h2>

<?php if (isset($_GET['error'])): ?>
<p style="color:red;"><?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
<p style="color:green;">
    Account created successfully.
    <a href="../login.php">Login</a>
</p>
<?php endif; ?>

<form method="POST" action="register_process.php">

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required minlength="6"><br><br>

    <label>Confirm Password</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Register</button>
</form>

</body>
</html>
