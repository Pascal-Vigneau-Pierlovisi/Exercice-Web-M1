<?php

include "fonctions.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = delete($id);
    echo $result;
    header('Location: Listing.php');
    exit();
}

?>