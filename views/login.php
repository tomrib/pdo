<section id="loginView">
    <h1>Connexion</h1>
    <form action="/connexion" method="POST">
        <div>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Ex: Globox">
            <?php if (isset($formErrors['username'])) { ?>
                <p><?= $formErrors['username'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="********">
            <?php if (isset($formErrors['password'])) { ?>
                <p><?= $formErrors['password'] ?></p>
            <?php } ?>
        </div>
        <div class="buttonsBox">
            <input type="submit" value="Connexion">
        </div>
    </form>
</section>