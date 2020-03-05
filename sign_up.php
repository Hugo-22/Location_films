<?php
include 'functions.php';

if (isset($_POST['user_name']) && isset($_POST['user_password'])) {

  $sql = "INSERT INTO users (name, password) VALUES ('".$_POST['user_name']."' , '".MD5($_POST['user_password'])."')";
  $req = $bdd->query($sql);
  // $req = $bdd->prepare($sql);
  // $name = $_POST['user_name'];
  // $_POST['user_password'] = MD5($_POST['user_password']);
  // $req->execute([$name, $_POST['user_password']]);
  header("location: login.php");
}

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
    <title>Inscription</title>
</head>
<body>
    <div class="wrapper fadeInDown">
      <h1>Inscription</h1>
  <div id="formContent">
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images/users.png" id="icon" alt="User Icon"/>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" class="fadeIn second" name="user_name" placeholder="Votre nom" required>
      <input type="password" class="fadeIn third" name="user_password" placeholder="Votre mot de passe" required>
      <input type="submit" class="fadeIn fourth btn-dark" value="S'inscrire">
    </form>
  </div>
</div>
</body>
</html>