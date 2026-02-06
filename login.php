<?php
include "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM admins WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  if (password_verify($password, $user['password'])) {
    $_SESSION['admin'] = $user['email'];
    echo "success";
    exit;
  }
}

echo "error";
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
