<?php
require_once "../config/session.php";
require_once "../users/auth_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add Employee</h2>
<?php if (isset($_GET['error'])): ?>
<p style="color:red;"><?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
<p style="color:green;">Employee added successfully</p>
<?php endif; ?>

<form method="POST" action="add_employee_process.php">

    <label>Employee Name</label><br>
    <input type="text" name="employee_name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone"><br><br>

    <label>Position</label><br>
    <input type="text" name="position"><br><br>

    <label>Address</label><br>
    <textarea name="address"></textarea><br><br>

    <button type="submit">Save Employee</button>
</form>

<a href="../dashboard.php">Back</a>

</body>
</html>
