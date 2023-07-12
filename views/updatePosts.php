<section id="registerView">
    <h1>Modifie- l'article</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <?php foreach ($readPosts as $z) { ?>
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= $z->title ?>">
            </div>

            <div>
                <label for="type">Categorie</label>
                <select name="type" id="type">
                    <option value="<?= $z->idCategories?>"><?= $z->name ?></option>
                    <?php //todo on fait un foreach pour affiche le contenu du tableau
                    foreach ($categoriesPostsList as $zp) { ?>
                        <option value="<?= $zp->id ?>"><?= $zp->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                </select>
                <label for="content">Votre article</label>
                <textarea cols="30" rows="10" name="content" id="content"><?= $z->content ?></textarea>
            </div>

            <div class="updateImg">
                <img src="<?= $z->image ?>" alt="">

            </div>

            <div>
                <label for="image">Votre image</label>
                <input type="file" name="image" id="image">

            </div>
        <?php } ?>
        <div class="buttonsBox">
            <input type="submit" name="edit" value="Modifier">
            <button name="edit" id="btnDelete">supprime</button>
            <button id="cancel"><a href="/vos-article">Annuler</a></button>
        </div>
    </form>

        <form action="">
            <div class="boxButtons boxDelete" id="delete">
                <div class="decoBoxDelete">
                    <h2>Attention</h2>
                    <p>Tout suppression est définitive</p>
                    <input type="submit" name="delete" href="/vos-article?id=<?= $z->id ?>" value="Supprime">
                    <button id="cancelPo-op" class="cancel">Annuler</button>
                </div>
            </div>
        </form>
</section>