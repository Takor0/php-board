<?php
session_start();
function generate_token($email): string
{
    return md5($email . time());
}

function http_response($data): void
{
    echo json_encode($data);
    exit();
}