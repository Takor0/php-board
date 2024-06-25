<?php

include(__DIR__ . '/src/repository/PostRepository.php');
include __DIR__ . '/src/utils/tab.php';

use function utils\get_tab;
use repository\PostRepository;
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tab = get_tab();
    $postRepo = new PostRepository();
    $posts = json_encode($postRepo->get_all_per_category($tab));

    $code = $_GET['code'];

    readfile('home.html');
    if ($code == 400) {
        echo "
        <script>
            alert('Bad request');
        </script>
        ";
    }
    echo "
    <script>
        const posts = $posts
        const user = {email: '" . $_SESSION['email'] . "', role: '" . $_SESSION['role'] . "'}
        console.log(user)
    </script>
    ";

}
