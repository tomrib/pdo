<h1>Profile</h1>

<form action="/Profil" method="POST">
    <button type="submit" id="btnDelete">Supprimer le compte utilisateur</dutton>
</form>
<form action="">
            <div class="boxButtons boxDelete" id="delete">
                <div class="decoBoxDelete">
                    <h2>Attention</h2>
                    <p>Toute suppression est définitive</p>
                    <input type="submit" name="delete" href="/accueil" value="Supprime">
                    <input type="submit" id="cancelPo-op" class="cancel" value="Annuler">
                </div>
            </div>
        </form>

<button><a href="/vos-article">Vos article</a></button>

<section id="loginView">
    <h2>Modifier votre nom</h2>
    <?php foreach ($readUser as $ru) { ?>
        <p><?= $ru->username ?></p>
        <p><?= $ru->email ?></p>
    <?php } ?>
    <form action="" method="POST">
        <div>
            <?php foreach ($readUser as $ru) { ?>

                <!--  <p><?= $ru->email ?></p> -->
                <label for="name">Nom d'utilisateur actuelle</label>
                <input type="text" id="name" name="name" value="<?= $ru->username ?>">
                <label for="newName">Nouveau Nom</label>
                <input type="text" id="newName" name="newName">
                <?php if (isset($formErrors['username'])) { ?>
                    <p><?= $formErrors['username'] ?></p>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="buttonsBox">
            <input type="submit" name="update" value="Modifier">
            <button id="cancel"><a href="/Profil">Annuler</a></button>
        </div>
    </form>
</section>


<h2>Article</h2>
<?php foreach ($profileItem as $pi) { ?>
    <section id="loginView">
        <div>
            <h2><?= $pi->title ?></h2>
            <img src="<?= $pi->image ?>" alt="">
            <p><?= $pi->content ?></p>
            <p><?= $pi->publicationDate ?></p>
            <p><?= $pi->username ?></p>
        </div>
    </section>
<?php } ?>

<h2>commentaire</h2>
<?php foreach ($profileComment as $pc) { ?>
    <section id="registerView">
        <div>
            <p>Publication le: <?= $pc->publicationDate ?></p>
            <p><?= $pc->content ?></p>
        </div>
    </section>
<?php } ?>