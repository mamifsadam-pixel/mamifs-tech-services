<?php
$conn = new mysqli("localhost", "root", "", "mamifs_site");

if ($conn->connect_error) {
  die("Database connection failed");
}
?>
