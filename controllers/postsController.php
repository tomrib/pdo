<?php
session_start();
require_once '../models/database.php';
require_once '../models/postsModel.php';

$countPostsPage = 3;
if (count($_GET) == 0) {
    $_GET['page'] = 1;
}
$page = $_GET['page'];
$debut = ($page -1) * $countPostsPage;
$postsCount = new posts;
$postsCount->debut = $debut;
$postsCount->countPostsPage = $countPostsPage;
$count = $postsCount->countPosts();
$countPage = ceil($count/$countPostsPage);

$createItem = $postsCount->getPosts();
var_dump($countPage);
require_once '../views/parts/header.php';
require_once '../views/readPosts.php';
require_once '../views/parts/footer.php';
