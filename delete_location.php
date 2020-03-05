<?php 
include 'functions.php';
    $sql = "DELETE FROM location WHERE id_loc=".$_GET['id_loc']." ";
    $req = $bdd->query($sql);
    header("location: recap_location.php");
