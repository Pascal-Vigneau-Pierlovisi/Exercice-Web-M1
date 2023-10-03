<?php

include "fonctions.php";

if (isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie'])) {
    $designation = $_POST['designation'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    $result = ajouter($designation, $prix, $categorie);
    echo $result;
    header('Location: Listing.php');
    exit();
}

?>