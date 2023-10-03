<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout / Modification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bulma.min.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            MonSite
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="#">
                Accueil
            </a>
            <a class="navbar-item" href="#">
                Liste Produit
            </a>
            <a class="navbar-item" href="AddUpdate.php">
                Ajout d'un produit
            </a>
        </div>
    </div>
</nav>

<div class="section">
    <div class="container">
        <table id="productTable" class="table is-fullwidth">
            <thead>
            <tr>
                <th>Nom du produit</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Date d'ajout</th>
                <th>Date de dernière modif</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
			<?php 
				include('fonctions.php');
				$result = AfficherProduits();
				foreach($result as $row){
				$designation = $row['nom'];
                $id = $row['id_prodruit'];
				$prix = $row['prix'];	
				$ajout = $row['date_in'];	
				$modif = $row['date_up'];	
				$categorie = $row['designation'];	
				echo"
				  <tr>
                <td>$designation</td>
				<td>$categorie</td>
                <td>$prix</td>
                <td>$ajout</td>
                <td>$modif</td>
                <td><a href='AddUpdate.php?id=$id'>✏️</a>&nbsp;<a href='supp.php?id=$id'>🗑️</a></td>
            </tr>
				";
				
				}?>
				
          
            <!-- Ajoutez d'autres lignes de produits ici -->
            </tbody>
        </table>
    </div>
</div>
<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bulma.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#productTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/French.json"
            }
        });
    });
</script>

</body>
</html>
