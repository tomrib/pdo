<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/main.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/accueil" title="Accueil">Accueil</a></li>
            <li><a href="/article" title="article">Article</a></li>
        </ul>
        <form action="/recherche" method="GET">
            <div class="buttonsBox">
                <input type="search" name="research" placeholder="Recherche">
                <input  id="cancel" type="submit">
            </div>
        </form>
        <ul>
            <?php if (isset($_SESSION['user'])) { ?>
                <li><a href="/Profil" title="Profil">Profil</a></li>
                <li><a href="/ajout-d-article" title="ajout-d-article">Ajout d'article</a></li>
                <li><a href="/deconnexion" title="deconnexion">Déconnexion</a></li>
            <?php } else {?>
                <li><a href="/connexion" title="Connexion">Connexion</a></li>
                <li><a href="/inscription" title="Inscription">Inscription</a></li>
            <?php }?>
        </ul>
    </nav>
    <main>