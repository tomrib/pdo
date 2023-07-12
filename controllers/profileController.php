<?php
session_start();
require_once '../models/database.php';
require_once '../models/commentsModel.php';
require_once '../models/postsModel.php';
require_once '../models/usersModel.php';
require_once '../config.php';

//todo les commentaire
$profileComment = new comments;
$profileComment->id_user = $_SESSION['user']['id'];
$profileComment = $profileComment->commentsProfile();

//todo les article
$profileItem = new posts;
$profileItem->id_users  = $_SESSION['user']['id'];
$profileItem = $profileItem->ItemProfile();


//todo affiche nom et mail de l utilisateur
$readUser = new users;
$readUser->id = $_SESSION['user']['id'];
$readUser = $readUser->readUser();

//todo modife de l'utilisateur
if (isset($_POST['update'])) {
    $updateUser = new users;
    $updateUser->name = $_POST['name'];

    if (!empty($_POST['newName'])) {
        if (preg_match($regex['name'], $_POST['newName'])) {
            $updateUser->newName = $_POST['newName'];
            $updateUser = $updateUser->updateUser();
        } else {
            $formErrors['username'] = USER_USERNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['username'] = USER_USERNAME_ERROR_EMPTY;
    }
}
//todo on supprime la comtp de l utilisateur
if (isset($_POST['delete'])) {
    $deleteUser = new users;
    $deleteUser->id = $_SESSION['user']['id'];
    $deleteUser->deleteUser();
    header('Location: /deconnexion');
}

require_once '../views/parts/header.php';
require_once '../views/profile.php';
require_once '../views/parts/footer.php';
