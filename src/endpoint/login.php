<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/bootstrap.php';

use endpoint\Router;
use utils\UserUtils;
use models\Token;
use models\User;


$router = new Router();

//TODO: Store token in DB, check if token is valid, clear tokens after some time
$router->post('login', function ($body) {
    $email = $body['email'];
    $password = $body['password'];
    if (!UserUtils::validate_credentials($email, $password)) {
        http_response_code(401);
        http_response(["message" => "Invalid credentials"]);
    }
    $token = generate_token($email);
    Token::store_user_token($email, $token);
    http_response(["message" => "Login successful", "token" => $token]);
});

$router->post('register', function ($body) {
    $email = $body['email'];
    $password = $body['password'];
    if (UserUtils::get_user($email)) {
        http_response_code(400);
        http_response(["message" => "User already exists"]);
    }
    User::create_user($email, $password);
    http_response(["message" => "User created"]);
});
