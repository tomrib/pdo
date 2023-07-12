<?php
session_start();
require_once '../models/database.php';
require_once '../models/postsModel.php';

    $research = new posts;
    $research->title = $_GET['research'];
    $researchPosts = $research->researchPosts();

require_once '../views/parts/header.php';
require_once '../views/postsResearch.php';
require_once '../views/parts/footer.php';