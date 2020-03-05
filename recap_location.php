<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="sidebar.css">
    <style>
h1 {
    text-align: center;
}
table {
    position: absolute;
    left: 50%;
    transform: translate(-50%);
}
table {
    text-align: center;
    width: 600px;
    height: 150px;
}
</style>
    <title>Récapitulatif location</title>
</head>
<body>
<?php include 'sidebar.php'; ?>
<section class="container-fluid">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <h1>Récapitulatif des locations en cours</h1>
                <br>

                <table class="table mx-auto table-hover">
                <thead class="thead-info">
                        <tr>
                            <th class="text-center">Client</th>
                            <th class="text-center">Film</th>
                            <th class="text-center">Début location</th>
                            <th class="text-center">Fin location</th>
                            <th class="text-center">Durée de la location</th>
                            <th class="text-center">Supprimer la location</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT nom_film, nom_client, prenom_client, date_debut, date_fin, id_loc FROM location INNER JOIN films ON location.id_film = films.id JOIN clients on location.id_client = clients.id";
                    $req = $bdd->query($sql);

                    while ($row = $req->fetch()) {
                        
                        $datetime1 = new DateTime($row['date_debut']);
                        $datetime2 = new DateTime($row['date_fin']);
                        $duree = date_diff($datetime1, $datetime2);
                        // $duree->format('%d jours');
                        // $datetime1->format('d/m/Y');
                        // $datetime2->format('d/m/Y');

                        echo "<tr> <td>".$row['nom_client']." ".$row['prenom_client']." </td> <td class='text-uppercase'>".$row['nom_film']." </td> <td>".$datetime1->format('d/m/Y')."</td> <td>".$datetime2->format('d/m/Y')."</td> <td>".$duree->format('%d jours')."</td> <td> <a class='badge badge-danger' href='delete_location.php?id_loc=" . $row['id_loc'] . "'>Supprimer</a> </td> </tr>";
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>

</body>
</html>



    