<?php

namespace db;
class DatabaseConnector
{
    private \PDO $dbConnection;

    public function __construct()
    {
        $host = getenv('DB_HOST') ?: "127.0.0.1";
        $port = getenv('DB_PORT') ?: "3301";
        $db = getenv('DB_DATABASE') ?: "s27268";
        $user = getenv('DB_USERNAME') ?: "s27268";
        $pass = getenv('DB_PASSWORD') ?: "Tom.Wako";

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection(): \PDO
    {
        return $this->dbConnection;
    }
}