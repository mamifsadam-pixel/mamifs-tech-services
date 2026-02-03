<?php
$conn = new mysqli("localhost", "root", "", "mamifs_db");
if ($conn->connect_error) {
  die("Database connection failed");
}
?>
