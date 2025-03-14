<?php
include('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM logs ORDER BY id DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Logs du serveur</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="dashboard-container">
  <div class="header">
    <h2>Logs du serveur FiveM</h2>
    <a href="logout.php" class="btn logout-btn">Déconnexion</a>
  </div>
  <table class="logs-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Type d'événement</th>
        <th>Description</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = $result->fetch_assoc()){ ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['event_type']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['event_date']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<script src="js/script.js"></script>
</body>
</html>
