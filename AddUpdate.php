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
            <a class="navbar-item" href="#">
                Liste Produit
            </a>
        </div>
    </div>
</nav>

<?php
if (isset($_GET["id"])) {

    ?>

    <div class="section">
        <div class="container">
            <h1 class="title">Modifier un Produit</h1>

            <form action="update.php" method="post">
                <div class="field">
                    <label class="label">Nom du produit</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Entrez le nom du produit" name="productName"
                               required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Catégories</label>
                    <div class="control">
                        <div class="select">
                            <select name="productCategorie" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="electronique">Électronique</option>
                                <option value="vetements">Vêtements</option>
                                <option value="alimentaire">Alimentaire</option>
                                <option value="livres">Livres</option>
                                <!-- Ajoutez d'autres catégories ici -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Entrez la description du produit"
                                  name="productDescription"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Prix</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="Entrez le prix du produit" name="productPrice"
                               step="0.01" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Modifier le Produit</button>
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
                        <input class="input" type="text" placeholder="Entrez le nom du produit" name="productName"
                               required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Catégories</label>
                    <div class="control">
                        <div class="select">
                            <select name="productCategorie" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="electronique">Électronique</option>
                                <option value="vetements">Vêtements</option>
                                <option value="alimentaire">Alimentaire</option>
                                <option value="livres">Livres</option>
                                <!-- Ajoutez d'autres catégories ici -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Entrez la description du produit"
                                  name="productDescription"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Prix</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="Entrez le prix du produit" name="productPrice"
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
