<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tab = $_GET['tab'];
    echo $tab;
}