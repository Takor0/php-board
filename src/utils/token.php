<?php

namespace utils;
include_once(__DIR__ . '/../repository/UserRepository.php');

use repository\UserRepository;


function set_user_session($email)
{
    session_start();

    $userRepo = new UserRepository();
    $user = $userRepo->findByEmail($email);
    $_SESSION['role'] = $user['role'];
    $_SESSION['email'] = $user['email'];
}