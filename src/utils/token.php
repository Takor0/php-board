<?php

namespace utils;
//logike jakas do tokena

function set_user_token($email)
{
    session_start();
    $_SESSION['token'] = md5($email . time());
}