<?php
session_start();
require_once '../models/database.php';
require_once '../models/postsModel.php';
require_once '../models/postCategoriesModel.php';
require_once '../config.php';

$posts = new posts;
$posts->id = $_GET['id'];
$readPosts = $posts->readPostsProfile();

$categoriesPosts = new postscategories;
$categoriesPostsList = $categoriesPosts->getPostscategories();

if (isset($_POST['delete'])) {
    $deletePosts = new posts;
    $deletePosts->id = $_GET['id'];
    unlink('../'.$readPosts[0]->image);
    $deletePosts->deletePosts();
    header('Location: /vos-article');
}

$update = new posts;
if (count($_POST) > 0) {
    $update->id = $_GET['id'];
    if (!empty($_POST['title'])) {
        if (strlen($_POST['title']) <= 100) {
            $update->title = strip_tags(trim($_POST['title']));
        } else {
            $formErrors['title'] = USER_POST_ERROR_INVALID;
        }
    } else {
        $formErrors['title'] = USER_POST_ERROR_TITLE;
    }

    if (!empty($_POST['type'])) {
        $categoriesPosts->id = $_POST['type'];
        if ($categoriesPosts->checkPosts() == 1) {
            $update->id_postsCategories = strip_tags($_POST['type']);
        } else {
            $formErrors['type'] = USER_POST_ERROR_INVALID_TYPE;
        }
    } else {
        $formErrors['type'] = USER_POST_ERROR_TYPE;
    }

    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $update->content = htmlspecialchars($_POST['content']);
        } else {
            $formErrors['content'] = USER_POST_ERROR_INVALID_CONTENT;
        }
    } else {
        $formErrors['content'] = USER_POST_ERROR_CONTENT;
    }

    
    if ($_FILES['image']['error'] != 4) {
        if ($_FILES['image']['error'] != 3 && $_FILES['image']['error'] != 2) {
            if ($_FILES['image']['error'] == 0) {
                //$fileInfo = ce une varible qui contien le retour de la fonction
                //pathinfo = retoune un tableau contenant le nom du dossiet ou et stocke le ficher le nom, extonsionet le nom santr l extension
                $fileInfo = pathinfo($_FILES['image']['name']);
                // !array_key_exists($fileInfo['extension'],$mime_types) = je verifi que mon extension soit dans mon tableau
                /**  mime_content_type($_FILES['image']['name']) == $mime_types[$fileInfo['extension']]) =
                 * sa conparrele type mime réel du ficher au type mine attendu du ficher
                 * */
                if (!array_key_exists($fileInfo['extension'], $mime_types) || mime_content_type($_FILES['image']['tmp_name']) != $mime_types[$fileInfo['extension']]) {
                    $formErrors['image'] = USER_POST_ERROR_IMAGE;
                }
            }
        }else{
            $formErrors['image'] = USER_POST_ERROR_IMAGE;
        }
    }

    if (count($formErrors) == 0) {
        $path = 'assets/img/' . uniqid() . '.' . $fileInfo['extension'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)) {
            chmod('../' . $path, '664');
            unlink('../'.$readPosts[0]->image);
            $update->image = $path;
            $update->updatePostsUser();
            $readPosts = $posts->readPostsProfile();
        }
    }
}

require_once '../views/parts/header.php';
require_once '../views/updatePosts.php';
require_once '../views/parts/footer.php';
