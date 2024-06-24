<?php

namespace root;
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/cors.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$paths = [__DIR__ . '/models'];

$isDevMode = true;

// the connection configuration
$dbParams = [
    'host' => 'db',
    'driver' => 'pdo_mysql',
    'port' => "3301",
    'dbname' => "s27268",
    'user' => "s27268",
    'password' => "Tom.Wako",
    'charset' => 'utf8mb4',
];

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$em = new EntityManager($connection, $config);

//$user = $em->getRepository('models\User')->findOneBy(['email' => 'admin@haha.com']);


