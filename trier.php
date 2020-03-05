<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sidebar.css">
    <title>Filtrer les locations</title>
</head>
<body>
<?php include 'sidebar.php';?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <h1 class="text-center">Trier les locations</h1>
                <br>
                <table class="table mx-auto">
                    <form action="" method="post">
                        <thead class="thead-info">
                            <tr>
                                <th class="text-center">Trier part</th>
                                <th class="text-center">Valider</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="client_nom" class="form-control border-dark custom-select">
                                    <?php
                                $sql_client = "SELECT * FROM clients";
                                $req_client = $bdd->query($sql_client);
                                echo "<option>Choix client</option>";
                                while ($row_client = $req_client->fetch()) {

                                    echo "<option value='" . $row_client['id'] . "'> " . $row_client['nom_client'] . "</option>";
                                }
                                ?>
                                    </select>
                                </td>

                                <td>
                                    <input class="form-control border-dark" type="submit" value="Trier">
                                </td>
                            </form>
                        </tr>
                      <form action="" method="post">
                      <tr>
                                <td>
                                    <select name="select_film" class="form-control border-dark custom-select">
                                        <?php
                                        $sql_film = "SELECT * FROM films";
                                        $req_film = $bdd->query($sql_film);
                                        echo "<option>Choix film</option>";
                                        while ($row_film = $req_film->fetch()) {

                                            echo "<option value='" . $row_film['id'] . "'> " . $row_film['nom_film'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                <input class="form-control border-dark" type="submit" value="Trier">
                                </td>
                        </tr>
                      </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php
// Condition filter with client's name
if (isset($_POST['client_nom'])) {

    echo "<div class='container''>";
    echo "<table class='table mx-auto'> <thead> 
        <tr> <th>Film</th> <th>Début location</th> <th>Fin location</th> <th>Durée</th> </tr>
    </thead>
    <tbody>";


    // $duree->format('%d jours');
    // $datetime1->format('d/m/Y');
    // $datetime2->format('d/m/Y');
    
    $sql_filter_client = "SELECT nom_film, nom_client, prenom_client, date_debut, date_fin FROM location INNER JOIN films ON location.id_film = films.id JOIN clients on location.id_client = clients.id WHERE $_POST[client_nom] = clients.id";
    $req_filter_client = $bdd->query($sql_filter_client);
    
    // echo "Liste des films loué part " . $_POST['client_nom'];
    
    while ($row_location = $req_filter_client->fetch()) {

        $datetime1 = new DateTime($row_location['date_debut']);
        $datetime2 = new DateTime($row_location['date_fin']);
        $duree = date_diff($datetime1, $datetime2);

        echo "<tr> <td>" . $row_location['nom_film'] ."</td> <td>" .$datetime1->format('d/m/Y'). "</td> <td>" .$datetime2->format('d/m/Y'). "</td> <td>" .$duree->format('%d jours de location'). "</td></tr>";
    }
    echo "</tbody> </table> </div>";
}

// echo $_POST['select_film'];
// var_dump ($_POST['select_film']);
// var_dump ($_POST['client_nom']);

// Condition filter with movie's name
if (isset($_POST['select_film'])) {

    echo "<div class='container''>";
    echo "<table class='table mx-auto'> <thead> 
        <tr> <th>Client</th> <th>Début location</th> <th>Fin location</th> <th>Durée</th> </tr>
    </thead>
    <tbody>";

    $sql_filter_film = "SELECT nom_film, nom_client, prenom_client, date_debut, date_fin FROM location INNER JOIN clients on location.id_client = clients.id JOIN films on location.id_film = films.id WHERE $_POST[select_film] = films.id";
    $req_filter_film = $bdd->query($sql_filter_film);
    // echo "Liste des clients ayant loué le film suivant " . $_POST['select_film'];

    while ($row = $req_filter_film->fetch()) {

        $datetime1 = new DateTime($row['date_debut']);
        $datetime2 = new DateTime($row['date_fin']);
        $duree = date_diff($datetime1, $datetime2);

        echo "<tr> <td>" . $row['nom_client'] ."</td> <td>" .$datetime1->format('d/m/Y'). "</td> <td>" .$datetime2->format('d/m/Y'). "</td> <td>" .$duree->format('%d jours de location'). "</td></tr>";
    }
    echo "</tbody> </table> </div>";
}