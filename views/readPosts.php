<section id="registerView">
<?php for ($i=1; $i <= $countPage ; $i++) { 
  echo "<a href='?page=$i'>$i</a>&nbsp";
} ?>
    <p>article: <?= $count; ?></p> 
    <h1>Article</h1>
    <?php if (count($createItem) > 0) { ?>
        <div>
            <?php foreach ($createItem as $c) { ?>
                <h2><?= $c->title ?></h2>
                <p>Categorie: <?= $c->name ?></p>
                <img src="<?= $c->image ?>" alt="">
                <p>Publication le: <?= $c->publicationDate ?></p>
                <p><?= $c->content ?></p>
                <p><?= $c->updateDate ?></p>
                <p>Publier par: <?= $c->username ?></p>
                <div class="buttonsBox">
                    <a href="/Lire-article-<?= $c->id ?>"><input type="submit" value="Voir L'article"></a>
                </div>
            <?php } ?>   
        <?php } else { ?>
            <p>Désolé aucun article n est disponible pour le moment</p>
        <?php } ?>
        </div>
</section>