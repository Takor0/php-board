<?php

namespace utils;
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/bootstrap.php';

use models\User;

class UserUtils
{
    public static function get_user(string $email)
    {
        global $em;
        return $em->getRepository(User::class)->findOneBy(['email' => $email]);
    }
    public static function validate_credentials(string $email, string $password): bool
    {
        $user = UserUtils::get_user($email);
        if (!$user) {
            return false;
        }
        return $password === $user->getPassword();
    }
}
