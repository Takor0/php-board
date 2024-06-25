<?php

namespace repository;
include_once(__DIR__ . '/../models/User.php');

use models\User;

class UserRepository extends User
{
    function findByEmail(string $email)
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM user WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}