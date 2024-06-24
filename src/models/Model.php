<?php

namespace models;
include __DIR__ . '/../db/DatabaseConnector.php';

use db\DatabaseConnector;

abstract class Model
{
    protected \PDO $dbConnection;
    protected string $model;

    public function getAll(): array
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM $this->model");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function __construct()
    {
        $databaseConnector = new DatabaseConnector();
        $this->dbConnection = $databaseConnector->getConnection();
    }


}