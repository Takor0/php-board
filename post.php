<?php
include __DIR__ . '/src/repository/PostRepository.php';
include __DIR__ . '/src/utils/tab.php';

use repository\PostRepository;
use function utils\get_tab;

session_start();


$tab = get_tab();
$code = 400;

function handle_create_post(): int
{
    if (!isset($_SESSION['email'])) {
        return 400;
    }
    global $tab;
    $content = $_POST['content'];
    $author = $_SESSION['email'];

    $postRepo = new PostRepository();
    $postRepo->create_post($content, $tab, $author);
    return 200;
}

function handle_delete_post(): int
{
    $id = $_POST['id'];
    $postRepo = new PostRepository();
    $post = $postRepo->findById($id);
    if ($post['author'] !== $_SESSION['email'] || $_SESSION['role'] !== 'admin') {
        return 400;
    }
    $postRepo->delete_post($id);
    return 200;
}

function handle_edit_post(): int
{
    $id = $_POST['id'];

    $postRepo = new PostRepository();
    $post = $postRepo->findById($id);
    if ($post['author'] !== $_SESSION['email']) {
        return 400;
    }

    $content = $_POST['content'];
    $postRepo = new PostRepository();
    $postRepo->edit_post_content($id, $content);
    return 200;
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
            $code = handle_create_post();
            break;
        case 'delete_post':
            $code = handle_delete_post();
            break;
        case 'edit_post':
            $code = handle_edit_post();
            break;
        case 'export_posts':
            handle_posts_export();
            $code = 200;
            break;
    }
}


header("Location: /home.php?tab=$tab&code=$code");
