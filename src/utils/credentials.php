<?php

namespace credentials;
include(__DIR__ . '/../repository/UserRepository.php');

use repository\UserRepository;

function validate_credentials(string $email, string $password): bool
{
    $userRepo = new UserRepository();
    $user = $userRepo->findByEmail($email);
    $user_password = $user['password'];
    return $password == $user_password;
}