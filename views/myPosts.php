<section id="registerView">
    <h1>Vos Publication</h1>
    <h2>bonjour <?= $_SESSION['user']['id']; ?></h2>

    <form action="/vos-article" method="POST">
        <label for="myCategories"></label>
        <select name="myCategories" id="myCategories">
            <option name="vide" selected disabled>---</option>
            <?php //todo on fait un foreach pour affiche le contenu du tableau
            foreach ($myCategoriesList as $mcp) { ?>
                <option value="<?= $mcp->id ?>"><?= $mcp->name ?></option>
            <?php } ?>
        </select>
        <div class="buttonsBox">
            <a href="/vos-article"><input type="submit" name="research" value="Recherche"></a>
        </div>
    </form>
    <?php if (!empty($_POST['myCategories'])) { ?>
        <div class="boxItem">
            <?php foreach ($myItem as $cp) { ?>
                <h2><?= $cp->title ?></h2>
                <p>Categorie: <?= $cp->name ?></p>
                <img src="<?= $cp->image ?>" alt="" class="itemImg">
                <p>Publication le: <?= $cp->publicationDate ?></p>
                <p><?= $cp->content ?></p>
                <p><?= $cp->updateDate ?></p>
                <p>Publier par: <?= $cp->username ?></p>
                <div class="buttonsBox">
                    <a href="/modifier-article<?= $cp->id ?>"><button>Modifier</button></a>
                </div>
                <?php } ?>
                <?php } else { ?>
                    <p>Désolé aucun article n est disponible pour le moment</p>
                    <?php } ?>
        </div>
</section>