<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: index.html");
  exit;
}
include "db.php";

/* Fetch data */
$services = $conn->query("SELECT COUNT(*) AS total FROM services")->fetch_assoc();
$payments = $conn->query("SELECT COUNT(*) AS total FROM payments")->fetch_assoc();
?>


<h1>Welcome Admin</h1>
<a href="logout.php">Logout</a>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
:root{
  --bg:#0b0f1a;
  --card:#11162a;
  --accent:#1e90ff;
  --gold:#d4af37;
  --text:#eaeaea;
}

*{box-sizing:border-box;font-family:Segoe UI,Arial}

body{
  margin:0;
  background:var(--bg);
  color:var(--text);
}

/* Layout */
.dashboard{
  display:grid;
  grid-template-columns:260px 1fr;
  min-height:100vh;
}

/* Sidebar */
.sidebar{
  background:#080c18;
  padding:20px;
}

.logo{
  font-size:22px;
  font-weight:bold;
  color:var(--gold);
  margin-bottom:30px;
}

.nav a{
  display:block;
  padding:12px;
  margin-bottom:10px;
  text-decoration:none;
  color:var(--text);
  border-radius:8px;
}

.nav a:hover{
  background:var(--accent);
}

/* Main */
.main{
  padding:30px;
}

.header{
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.header h1{
  margin:0;
  color:var(--gold);
}

.logout{
  background:red;
  color:white;
  padding:8px 14px;
  border-radius:6px;
  text-decoration:none;
}

/* Cards */
.cards{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
  gap:20px;
  margin-top:30px;
}

.card{
  background:var(--card);
  padding:20px;
  border-radius:14px;
  box-shadow:0 10px 30px rgba(0,0,0,.4);
}

.card h2{
  margin:0;
  color:var(--accent);
}

.card p{
  margin-top:10px;
  font-size:14px;
}

/* Responsive */
@media(max-width:768px){
  .dashboard{grid-template-columns:1fr}
  .sidebar{display:none}
}
</style>
</head>

<body>

<div class="dashboard">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="logo">⚡ Admin Panel</div>
    <nav class="nav">
      <a href="#">Dashboard</a>
      <a href="#">Services</a>
      <a href="#">Payments</a>
      <a href="#">Messages</a>
      <a href="#">Settings</a>
    </nav>
  </aside>

  <!-- MAIN -->
  <main class="main">
    <div class="header">
      <h1>Welcome, Admin</h1>
      <a href="logout.php" class="logout">Logout</a>
    </div>

    <section class="cards">
      <div class="card">
        <h2>Services</h2>
        <p>Manage all your services here.</p>
      </div>

      <div class="card">
        <h2>Payments</h2>
        <p>Track and manage payments.</p>
      </div>

      <div class="card">
        <h2>Messages</h2>
        <p>Client contact & inquiries.</p>
      </div>

      <div class="card">
        <h2>Website</h2>
        <p>Edit homepage content.</p>
      </div>
    </section>

  </main>

</div>

</body>
</html>
