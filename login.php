<?php
include('config.php');
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']); // En production, utilisez password_hash()/password_verify()

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-container">
  <div class="login-card">
    <h2>Connexion</h2>
    <?php if($error != ""){ echo '<div class="alert alert-danger">'.$error.'</div>'; } ?>
    <form method="post" action="login.php">
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn">Se connecter</button>
    </form>
  </div>
</div>
<script src="js/script.js"></script>
</body>
</html>
