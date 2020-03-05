<?php include 'functions.php'; 

if (empty($_SESSION['name'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sidebar.css">

    <title>Accueil</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section class="container-fluid">
    <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12">
                <br>
                <h1 class="text-center">Films disponible à la location</h1>
                <table class="table table-hover">
                <thead class="thead-info">
                    <tr>
                        <th scope="col">Film</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM films";
                $req = $bdd->query($sql);

                while ($row = $req->fetch()) {
                    echo "<tr> <td class='text-uppercase'>" . $row['nom_film'] . "</td><td> <a class='badge badge-success'  href='update.php?id_film=" . $row['id'] . " '>Modifier</a></td><td> <a class='badge badge-danger' href='delete.php?id_film=" . $row['id'] . "'>Supprimer</a> </td></tr>";
                }
                ?>
                </tbody>
                </table>
                
                </div>
            </div>
</div>
    </section>
</body>
</html>
<?php
