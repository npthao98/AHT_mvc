<?php
require_once "vendor/autoload.php";

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/Models'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'AHT_mvc_doctrine',
    'user' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'post' => '8889',
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);