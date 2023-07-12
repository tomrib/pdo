<section>
    <div>
        <?php foreach($researchPosts as $rp) {?>
            <h1><?= $rp->title?></h1>
            <img src="<?= $rp->image?>" alt="">
            <p><?= $rp->content?></p>
            <p><?= $rp->name?></p>
            <p><?= $rp->publicationDate?></p>
            <p><?= $rp->updateDate?></p>
            <?php }?>
    </div>
</section>