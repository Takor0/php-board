<?php
include __DIR__ . '/src/repository/PostRepository.php';

use repository\PostRepository;

$tab = $_GET['tab'];
$content = $_POST['content'];
$author = 'admin@haha.com';
echo $content;

$postRepo = new PostRepository();
$postRepo->create_post($content, $tab, $author);

header("Location: /home.php?tab=$tab");
