<?php


function ajouter($designation,$prix,$categorie){
	include('connect_mysql.php');
	$sql = "insert into prodruits (designation,prix,categorie) VALUES (:designation,:prix,:categorie)";
	$stmt = $pdo->prepare($sql);
	// Liaison des valeurs aux paramètres
	$stmt->bindParam(':designation', $designation);
	$stmt->bindParam(':prix', $prix);
	$stmt->bindParam(':categorie', $categorie);

	// Exécution de la requête
	$stmt->execute();

	// Fermeture de la connexion
	$pdo = null;

	// Indiquer le succès de l'insertion
	return "Produit ajouté avec succès!";	
}

function modifier($id,$designation,$prix,$categorie){
	include('connect_mysql.php');
	  $sql = 'UPDATE prodruits SET designation=:designation, prix=:prix, categorie=:categorie WHERE id_prodruit=:id';
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':categorie', $categorie);

        // Exécution de la requête
        $stmt->execute();

        // Fermeture de la connexion
        $pdo = null;

        // Indiquer le succès de la mise à jour
        return "Produit modifié avec succès!";
}


function delete($id){
	include('connect_mysql.php');
	$sql = "DELETE FROM prodruits WHERE id_prodruit=:id";
	$stmt = $pdo->prepare($sql);

	// Liaison de la valeur du paramètre
	$stmt->bindParam(':id', $id);

	// Exécution de la requête
	$stmt->execute();

	// Fermeture de la connexion
	$pdo = null;
	
	return "Produit supprimé avec succès!";
}

function getProduit($id){
	include('connect_mysql.php');
	$sql = "SELECT * from prodruits where id_prodruit=:id";
	$stmt = $pdo->prepare($sql);

	// Liaison de la valeur du paramètre
	$stmt->bindParam(':id', $id);

	// Exécution de la requête
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$data=array();
	foreach($result as $row){
		$data['designation'] = $row['designation'];
		$data['prix'] = $row['prix'];
		$data['categorie'] = $row['categorie'];
	}
	return $data;
}

function AfficherProduits(){
	include('connect_mysql.php');
	$sql = "SELECT p.id_prodruit, p.date_in, p.date_up, p.prix, c.designation,p.designation as nom 
			FROM prodruits AS p 
			JOIN categorie AS c ON p.categorie = c.id_categorie;
			)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function listeCategories(){
    include('connect_mysql.php');
    $sql = "SELECT * from categorie";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}


?>