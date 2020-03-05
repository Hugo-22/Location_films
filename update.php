<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="sidebar.css">
<title>Modifier un film</title>
</head>
<body>
<?php include 'sidebar.php';?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <br>
                <h1 class="text-center">Modifier le nom</h1>
                <br>
        <form class="text-center" action="" method="post">
        <?php

        $sql = "SELECT * FROM films WHERE id=".$_GET['id_film']." ";
        $req = $bdd->query($sql);

        while ($row = $req->fetch()) {
            echo "<input class='text-center border border-dark' type='text' name='nom_film' value='".$row['nom_film']."' >";
        }
        ?>
            <input class="btn-dark rounded" type="submit" value="Modifier">
        </form>
    </div>
    </div>
    </div>
</section>

</body>
</html>
<?php
    if (isset($_POST['nom_film'])) {
        $new_sql = "UPDATE films SET nom_film='".$_POST['nom_film']."' WHERE id=".$_GET['id_film']." ";
        $new_req = $bdd->query($new_sql);
        header("Location:index.php");
    }
?>