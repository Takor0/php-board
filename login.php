<?php
include(__DIR__ . '/src/utils/credentials.php');
include(__DIR__ . '/src/utils/token.php');

use function credentials\validate_credentials;
use function utils\set_user_session;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $canLogin = validate_credentials(
        $_POST['email'], $_POST['password']
    );
    if ($canLogin) {
        set_user_session($_POST['email']);
        header('Location: /home.php?tab=Programowanie');
    } else {
        readfile('login.html');
        echo "
        <script>
            alert('Invalid credentials');
        </script>
        ";
    }

}

