<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include "db.php";

$result = $conn->query("SELECT * FROM services");
?>

<h2>Services</h2>

<?php while($row = $result->fetch_assoc()): ?>
  <div style="background:#0f1838;padding:15px;margin:10px 0;border-radius:8px">
    <strong><?= $row['title'] ?></strong><br>
    <small><?= $row['description'] ?></small>
  </div>
<?php endwhile; ?>
