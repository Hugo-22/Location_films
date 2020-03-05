<?php include 'functions.php'; ?>

<?php
if (isset($_POST['nom_film'])) {

    $sql = "INSERT INTO films (nom_film) VALUES ('" . addslashes($_POST['nom_film']) . "')";
    $req = $bdd->query($sql);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="sidebar.css">
<title>Ajouter un film</title>
</head>
<body>
<?php include 'sidebar.php';?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <br>
                <h1 class="text-center">Ajouter un film</h1>
                <br>
        <form class="text-center" action="" method="post">
            <input class="text-center border border-dark" type="text" name="nom_film" id="">
            <input class="btn-dark rounded" type="submit" value="Ajouter">
        </form>
    </div>
    </div>
    </div>
</section>

</body>
</html>
