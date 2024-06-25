<?php

namespace validators;
include_once(__DIR__ . '/../repository/UserRepository.php');

use repository\UserRepository;

class Validators
{
    public static function validate_credentials(string $email, string $password): bool
    {
        $userRepo = new UserRepository();
        $user = $userRepo->findByEmail($email);
        $user_password = $user['password'];
        return $password == $user_password;
    }
}