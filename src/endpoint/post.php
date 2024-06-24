<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/bootstrap.php';

use endpoint\Router;

$router = new Router();
$router->post('new', function ($body) {
    $content = $body['content'];
    $user = $body['user'];

    http_response(["message" => "Post created", "content" => $content, "user" => $user]);

});