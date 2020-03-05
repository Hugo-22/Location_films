<?php 
    include 'functions.php';
    $sql = "DELETE FROM films WHERE id=".$_GET['id_film']." ";
    $req = $bdd->query($sql);
    header("location: index.php");