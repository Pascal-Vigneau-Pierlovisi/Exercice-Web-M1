<?php

include "fonctions.php";

if (isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie']) && isset($_POST['id'])) {
    $designation = $_POST['designation'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $id = $_POST['id'];

    echo "Hello World";

    $result = modifier($id,$designation,$prix,$categorie);
    echo $result;
    header('Location: Listing.php');
    exit();
}


?>