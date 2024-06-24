<?php

include(__DIR__ . '/src/repository/PostRepository.php');

use repository\PostRepository;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tab = $_GET['tab'];
    $postRepo = new PostRepository();
    $posts = json_encode($postRepo->get_all_per_category($tab));


    readfile('home.html');
    echo "
    <script>
        const posts = $posts
    </script>
    ";

}
