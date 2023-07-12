<?php
session_start();
require_once '../models/database.php';
require_once '../models/postsModel.php';
require_once '../models/postCategoriesModel.php';


$categories = new postscategories;
//Affiche les catégories dans la liste déroulante
$myCategoriesList = $categories->getPostscategories();

$myItem = new posts;
if (!empty($_POST['myCategories'])) {
    $myItem->id_users = $_SESSION['user']['id'];
    $myItem->id_postsCategories = $_POST['myCategories'];
    $myItem = $myItem->getPostsByCategorie();
}



require_once '../views/parts/header.php';
require_once '../views/myPosts.php';
require_once '../views/parts/footer.php';