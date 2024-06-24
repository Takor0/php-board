<?php

include(__DIR__ . '/src/repository/PostRepository.php');

use repository\PostRepository;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tab = $_GET['tab'];
    $postRepo = new PostRepository();
    $posts = $postRepo->getALlPerCategory($tab);
    readfile("home.html");

    echo $posts[0]->content;

}
