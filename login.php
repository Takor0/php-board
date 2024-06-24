<?php
include(__DIR__ . '/src/utils/credentials.php');

use function credentials\validate_credentials;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $canLogin = validate_credentials(
        $_POST['email'], $_POST['password']
    );
    if ($canLogin) {
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

