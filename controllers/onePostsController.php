<?php
session_start();
require_once '../models/database.php';
require_once '../models/postsModel.php';
require_once '../models/commentsModel.php';



//todo on recupaire l article avec id
//todo on veriffi que il y a un id 

$item = new posts;
$item->id = $_GET['id'];

if ($item->checkPostsById() == 0) {
header("location:/article");
    exit;
}
$createItem = $item->createItem();
//todo on veriffi le commentaire con va ajoute

$comment = new comments;
$comment->id_posts = $_GET['id'];

if (count($_POST) > 0) {
    if (!empty($_POST['textContent'])) {
        $comment->content = strip_tags($_POST['textContent']);
    } else {
        $formErrors['textContent'] = USER_POST_ERROR_COMMENTS;
    }
    $comment->id_posts = $_GET['id'];
    $comment->id_user = $_SESSION['user']['id'];
    $comments = $comment->createComments();
}

//todo on affiche les commentaire

$readComments =  $comment->readComments();


require_once '../views/parts/header.php';
require_once '../views/readOnePosts.php';
require_once '../views/parts/footer.php';
