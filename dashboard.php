<?php
include "config.php";

if (!isset($_SESSION['admin'])) {
  header("Location: index.html");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body {
  background: #0a0a0a;
  color: gold;
  font-family: Arial;
}
</style>
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['admin']; ?></h1>
<p>You are now inside the REAL admin dashboard.</p>

<a href="logout.php">Logout</a>

</body>
</html>
