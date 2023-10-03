<?php
	$pdo = null;
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'database', 'Database2023@#');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>
