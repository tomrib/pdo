<section id="registerView">
    <h1>Ajout t'article</h1>
    <form method="POST" action="" enctype="multipart/form-data">

        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
            <?php //todo on fait un if pour ne pas avoit de p vide dans  html
            if (isset($formErrors['title'])) { 
                //todo le formErrors nous affiche l errore
                ?>
                <p><?= $formErrors['title'] ?></p>
            <?php } ?>
        </div>

        <div>
            <label for="type">Categorie</label>
            <select name="type" id="type">
                <option selected disabled>---</option>
                <?php //todo on fait un foreach pour affiche le contenu du tableau
                foreach ($categoriesList as $c){ ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php } ?>
            </select>
            <?php if (isset($formErrors['type'])) { ?>
                <p><?= $formErrors['type'] ?></p>
            <?php } ?>
        </div>

        <div>
            </select>
            <label for="content">Votre article</label>
            <textarea cols="30" rows="10" name="content" id="content"><?= isset($_POST['content']) && isset($formErrors['content']) ? : '';  ?></textarea>
            <?php if (isset($formErrors['content'])) { ?>
                <p><?= $formErrors['content'] ?></p>
            <?php } ?>
        </div>

        <div>
            <label for="image">Votre image</label>
            <input type="file" name="image" id="image">
            <?php if (isset($formErrors['image'])) { ?>
                <p><?= $formErrors['image'] ?></p>
            <?php } ?>
        </div>

        <div class="buttonsBox">
            <input type="submit" value="Publier">
            <button id="cancel"><a href="/accueil">Annuler</a></button>
        </div>
    </form>
</section>