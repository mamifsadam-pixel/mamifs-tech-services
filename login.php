<?php
session_start();
include "db.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT password FROM admins WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
  $stmt->bind_result($hashed);
  $stmt->fetch();

  if (password_verify($password, $hashed)) {
    $_SESSION['admin'] = $email;
    echo "success";
    exit;
  }
}

echo "error";
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: index.html');
  exit;
}
