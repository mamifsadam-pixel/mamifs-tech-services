<?php
session_start();
require 'db.php';
if(!isset($_SESSION['admin_id'])){
  header('Location: login.php');
  exit;
}

// Add service
if(isset($_POST['add'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stmt = $conn->prepare("INSERT INTO services (title, description, price) VALUES (?,?,?)");
  $stmt->bind_param("sss", $title, $description, $price);
  $stmt->execute();
}

// Delete service
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $conn->query("DELETE FROM services WHERE id=$id");
}

$services = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Services</title>
<style>
body{background:#0a0f1f;color:#fff;font-family:Arial;padding:20px}
form{background:#141b3d;padding:20px;border-radius:10px;width:300px}
input,textarea,button{width:100%;margin:8px 0;padding:10px}
button{background:gold;border:none;font-weight:bold}
.card{background:#141b3d;padding:15px;border-radius:10px;margin:10px 0}
a{color:red;text-decoration:none}
</style>
</head>
<body>
<h2>Services Manager</h2>

<form method="POST">
  <input name="title" placeholder="Service Title" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <input name="price" placeholder="Price / Contact">
  <button name="add">Add Service</button>
</form>

<h3>Existing Services</h3>
<?php while($row = $services->fetch_assoc()): ?>
  <div class="card">
    <h4><?= $row['title'] ?></h4>
    <p><?= $row['description'] ?></p>
    <strong><?= $row['price'] ?></strong><br>
    <a href="?delete=<?= $row['id'] ?>">Delete</a>
  </div>
<?php endwhile; ?>

</body>
</html>
