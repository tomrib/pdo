<section id="registerView">
    <h1>Inscription</h1>
    <?php if (isset($form)) { ?>
        <div class="formStatus <?= $form['status'] ?>">
            <?= $form['message']; ?>
        </div>
    <?php } else { ?>

        <form action="/inscription" method="post">
            <div>
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" placeholder="Ex: Globox">
                <?php if (isset($formErrors['username'])) { ?>
                    <p><?= $formErrors['username'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="birthdate">Date de naissance</label>
                <input type="date" name="birthdate" id="birthdate">
                <?php if (isset($formErrors['birthdate'])) { ?>
                    <p><?= $formErrors['birthdate'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="email">Adresse mail</label>
                <input type="email" name="email" id="email" placeholder="Ex: jean.dupont@mail.com">
                <?php if (isset($formErrors['email'])) { ?>
                    <p><?= $formErrors['email'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="*********">
                <?php if (isset($formErrors['password'])) { ?>
                    <p><?= $formErrors['password'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="passwordConfirm">Confirmation du mot de passe</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="*********">
                <?php if (isset($formErrors['passwordConfirm'])) { ?>
                    <p><?= $formErrors['passwordConfirm'] ?></p>
                <?php } ?>
            </div>

            <div class="buttonsBox">
                <input type="submit" value="Inscription">
                <button id="cancel"><a href="/accueil">Annuler</a></button>
            </div>
        </form>
    <?php } ?>
</section>