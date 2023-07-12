<section id="registerView">
    <h1>Article</h1>
    <!-- article -->
        <?php foreach ($createItem as $c) : ?>
            <h2><?= $c->title ?></h2>
            <p>Categorie: <?= $c->name ?></p>
            <img src="<?= $c->image ?>" alt="">
            <p>Publication le: <?= $c->publicationDate ?></p>
                <p><?= $c->content ?></p>
                <p><?= $c->updateDate ?></p>
                <p>Publier par: <?= $c->username ?></p>
        <?php endforeach; ?>
</section>

<?php foreach ($readComments as $rc){?>
<section id="loginView">
    <!-- commentaire afiche-->
        <p><?= $rc->content ?></p>
        <p><?= $rc->publicationDate ?></p>
        <p><?= $rc->username ?></p>
    </section>
    <?php }?>

<!--AJOUTE UN COMMENTAIRE-->
<?php if ($_SESSION) { ?>
<section id="loginView">
    <h1>Ajoute un commentaire</h1>
    <form action="" method="POST">
        <div>
            <label for="textContent">Votre commentaire</label>
            <input type="text" name="textContent" id="textContent">
        </div>
        <div class="buttonsBox">
            <input type="submit" value="Connexion">
        </div>
    </form>
</section>
<?php } ?>