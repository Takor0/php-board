<?php
include __DIR__ . '/src/repository/PostRepository.php';

use repository\PostRepository;

$tab = $_GET['tab'];

function handle_create_post()
{
    global $tab;
    $content = $_POST['content'];
    $author = 'admin@haha.com';

    $postRepo = new PostRepository();
    $postRepo->create_post($content, $tab, $author);

}

function handle_delete_post()
{
    $id = $_POST['id'];
    $postRepo = new PostRepository();
    $postRepo->delete_post($id);
}

function handle_edit_post()
{
    $id = $_POST['id'];
    $content = $_POST['content'];
    $postRepo = new PostRepository();
    $postRepo->edit_post_content($id, $content);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'create_post':
            handle_create_post();
            break;
        case 'delete_post':
            handle_delete_post();
            break;
        case 'edit_post':
            handle_edit_post();
            break;
    }
}


header("Location: /home.php?tab=$tab");
