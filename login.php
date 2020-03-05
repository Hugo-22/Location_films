<?php
session_start();
include 'functions.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="wrapper fadeInDown">
    <h1>Connexion</h1>
    <?php
    if (isset($_POST['name']) && isset($_POST['password'])) {

      // cette requête permet de récupérer l'utilisateur depuis la BD
      $requete = "SELECT * FROM `users` WHERE `name`=? AND `password`=?";
      $resultat = $bdd->prepare($requete);
      $name = $_POST['name'];
      $_POST['password'] = MD5($_POST['password']);
      $resultat->execute([$name, $_POST['password']]);
  
      if ($resultat->fetchColumn()) {
          // l'utilisateur existe dans la table
          // on ajoute ses infos en tant que variables de session
          $_SESSION['name'] = $name;
          $_SESSION['password'] = MD5($password);
          header("location: index.php");
      }
      else {
        echo "<h5>Identifiant incorrect, veuillez réessayer.</h5>";
      } 
  }
  ?>
  <div id="formContent">
    <div class="fadeIn first">
      <img src="images/users.png" id="icon" alt="User Icon"/>
    </div>

    <form method="post" action="login.php">
      <input type="text" id="login" class="fadeIn second" name="name" placeholder="Votre nom" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Votre mot de passe" required>
        <input type="submit" class="fadeIn fourth" value="Se connecter">
      <p class="fadeIn fourth">OU</p>
      <a href="sign_up.php" class="link-sign-up fadeIn fourth">S'inscrire</a>
    </form>
  </div>
</div>

</body>
</html>