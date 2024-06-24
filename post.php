<?php
include __DIR__ . '/src/repository/PostRepository.php';
include __DIR__ . '/src/utils/tab.php';

use repository\PostRepository;
use function utils\get_tab;


$tab = get_tab();

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

function handle_posts_export()
{
    global $tab;
    $postRepo = new PostRepository();
    $posts = $postRepo->get_all_per_category($tab);
    $filename = "$tab.txt";
    $file = fopen($filename, 'w');
    foreach ($posts as $post) {
        $row = "[$post->created_at] $post->author: $post->content\n";
        fputs($file, $row);
    }
    fclose($file);
    header('Content-Type: application/csv');
    header("Content-Disposition: attachment; filename=$filename");
    header('Pragma: no-cache');
    readfile($filename);
    exit();
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
        case 'export_posts':
            handle_posts_export();
            break;
    }
}


header("Location: /home.php?tab=$tab");
