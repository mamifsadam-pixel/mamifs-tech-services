<?php
$conn = new mysqli("localhost", "root", "", "lamp_login");
if ($conn->connect_error) {
  die("Database connection failed");
}
session_start();
