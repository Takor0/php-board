<?php

namespace endpoint;
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/bootstrap.php';

class Router
{
    private mixed $headerName;
    private mixed $body_data;

    function __construct()
    {
        $this->body_data = json_decode(file_get_contents('php://input'), true);
        $this->headerName = $_SERVER['HTTP_ENDPOINT_NAME'];
    }

    function get($name, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $this->headerName === $name) {
            $callback();
        }
    }

    function post($name, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->headerName === $name) {
            $callback($this->body_data);
        }
    }
}