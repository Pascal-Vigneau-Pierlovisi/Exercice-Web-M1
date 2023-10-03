<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout / Modification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
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
            <a class="navbar-item" href="Listing.php">
                Liste Produit
            </a>
        </div>
    </div>
</nav>

<?php

include_once 'fonctions.php';

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $data = getProduit($id);

    $designation = $data['designation'];
    $categorie = $data['categorie'];
    $prix = $data['prix'];


    ?>

    <div class="section">
        <div class="container">
            <h1 class="title">Ajouter un produit</h1>

            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" >
                <div class="field">
                    <label class="label">Nom du produit</label>
                    <div class="control">
                        <input class="input" type="text" name="designation" value="<?php echo $designation ?>"
                               required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Catégories</label>
                    <div class="control">
                        <div class="select">
                            <select name="categorie" required>
                                <?php
                                $result = listeCategories();
                                foreach ($result as $row) {
                                    $idCate = $row['id_categorie'];
                                    $designation = $row['designation'];
                                    $selected = $idCate == $categorie ? 'selected' : '';
                                    echo "<option value='$idCate' $selected>$designation</option>";

                                } ?>
                                <!-- Ajoutez d'autres catégories ici -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Prix</label>
                    <div class="control">
                        <input class="input" type="number" name="prix"
                               step="0.01" value=<?php echo $prix ?> required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Modifier le produit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
} else {
    ?>

    <div class="section">
        <div class="container">
            <h1 class="title">Ajouter un produit</h1>

            <form action="add.php" method="post">
                <div class="field">
                    <label class="label">Nom du produit</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Entrez le nom du produit" name="designation"
                               required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Catégories</label>
                    <div class="control">
                        <div class="select">
                            <select name="categorie" required>
                                <?php
                                $result = listeCategories();
                                foreach ($result as $row) {
                                    $id = $row['id_categorie'];
                                    $designation = $row['designation'];
                                    echo "
                                    <option value=$id >$designation</option>
				";

                                } ?>
                                <!-- Ajoutez d'autres catégories ici -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Prix</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="Entrez le prix du produit" name="prix"
                               step="0.01" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Ajouter le produit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
}
?>

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

</body>
</html>
