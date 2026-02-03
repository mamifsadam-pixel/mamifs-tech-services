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
<meta charset="UTF-8">
<title>Lamp Login</title>

<style>
body{
  margin:0;
  background:#05070f;
  color:white;
  font-family:Segoe UI, sans-serif;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

.container{text-align:center}

/* LAMP */
.cord{width:4px;height:140px;background:#333;margin:auto}
.lamp{
  width:140px;height:90px;
  background:linear-gradient(#222,#000);
  border-radius:0 0 70px 70px;
  cursor:pointer;
  animation:swing 4s ease-in-out infinite;
  transform-origin:top center;
}
@keyframes swing{
  0%{transform:rotate(2deg)}
  50%{transform:rotate(-2deg)}
  100%{transform:rotate(2deg)}
}

/* LIGHT */
.light{
  margin:auto;
  width:0;height:0;
  background:radial-gradient(circle at top, rgba(255,215,120,.45), transparent 70%);
  clip-path:polygon(45% 0%,55% 0%,100% 100%,0% 100%);
  opacity:0;
  transition:.4s;
}

/* LOGIN */
.login-box{
  background:#101530;
  padding:25px;
  width:300px;
  margin-top:20px;
  border-radius:12px;
  display:none;
}
input,button{
  width:100%;
  padding:10px;
  margin:8px 0;
  border:none;
  border-radius:6px;
}
button{
  background:gold;
  font-weight:bold;
  cursor:pointer;
}
.error{color:red}
</style>
</head>

<body>

<div class="container">
  <div class="cord"></div>
  <div class="lamp" onclick="toggleLogin()"></div>
  <div class="light" id="light"></div>

  <div class="login-box" id="loginBox">
    <form method="POST">
      <input name="email" placeholder="Email" required>
      <input name="password" type="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p class="error"><?php echo $msg; ?></p>
  </div>
</div>

<script>
function toggleLogin(){
  document.getElementById("loginBox").style.display = "block";
  document.getElementById("light").style.width = "420px";
  document.getElementById("light").style.height = "500px";
  document.getElementById("light").style.opacity = "1";
}
</script>

</body>
</html>
