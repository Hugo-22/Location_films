<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=hugod_films', 'hugod', 'g0fPxO9xySnVnQ==');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh = null;
    // echo "je suis connecté";
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>