<?php
include 'functions.php';

    if (isset($_POST['films']) && isset($_POST['clients'])) {

        $sql_insert = "INSERT INTO location (id_film, id_client, date_debut, date_fin) VALUES ('".$_POST['films']."', '".$_POST['clients']."', '".$_POST['datedebut']."', '".$_POST['datefin']."')" ;
        $req_insert = $bdd->query($sql_insert);
        header("location: recap_location.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="sidebar.css">
    <title>Ajouter une location</title>
</head>
<body>
<?php include 'sidebar.php';?>

<div class="container">
    <br>
    <br>
    <br>
    <h1 class="text-center">Ajouter une location</h1>
    <?php
?>
    <div class="row">
        <div class="col-lg-12 d-flex">
            <table class="table mt-5 mx-auto">
                    <form action="" method="post">
                    <thead class="thead-info">
                        <tr>
                            <th class="text-center">Film</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Début location</th>
                            <th class="text-center">Fin location</th>
                            <th class="text-center">Ajouter</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td class="p-2">
                    <select name="films" id="" class="form-control border-dark custom-select">
                    <?php
                    $sql_films = "SELECT * FROM films";
                    $req_films = $bdd->query($sql_films);

                    while ($row = $req_films->fetch()) {

                        echo "<option value='" . $row['id'] . "'> " . $row['nom_film'] . "</option>";
                    }
                    ?>
                    </select>
                    </td>
                    <td class="p-2">
                    <select name="clients" class="form-control border-dark custom-select">
                    <?php
                    $sql_clients = "SELECT * FROM clients";
                    $req_clients = $bdd->query($sql_clients);
                    while ($row = $req_clients->fetch()) {
                        echo " <option value='".$row['id']. "'> " . $row['nom_client'] . " ". $row['prenom_client'] ."</option>";
                    }
                    ?>
                    </select>
                    </td>

                    <td class="p-2">
                    <input class="form-control border-dark" type='date' name='datedebut'>
                    </td>
                    <td class="p-2">
                    <input class="form-control border-dark" type='date' name='datefin'>
                    </td>

                    <td class="p-2">
                    <input class="form-control border-dark" type='submit' value='Valider'></td>

                    </tr>
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>
</html>