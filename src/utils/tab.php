<?php

namespace utils;
function get_tab(): string
{
    if (isset($_GET['tab'])) {
        $tab = $_GET['tab'];
    } else if (isset($_COOKIE['last_visited_tab'])) {
        $tab = $_COOKIE['last_visited_tab'];
    } else {
        $tab = 'Programowanie';
    }
    setcookie("last_visited_tab", $tab, time() + (86400 * 30), "/");
    return $tab;
}