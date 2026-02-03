<?php
session_start();
include "config.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT password FROM admins WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
      $_SESSION["admin"] = $email;
      header("Location: dashboard.php");
      exit;
    } else {
      $msg = "Wrong password";
    }
  } else {
    $msg = "Admin not found";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
<h2>Admin Login</h2>
<form method="POST">
  <input name="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>

