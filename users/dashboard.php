<?php
require_once "auth_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee System</title>
</head>
<body>

<h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h2>

<p>This is the Employee Management System.</p>
<a href="../employees/add_employee.php"><button> employees</button></a>

<a href="logout.php">Logout</a>

</body>
</html>
