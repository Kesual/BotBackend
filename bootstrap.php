<?php

// bootstrap.php
// Include Composer Autoload (relative to project root).
require_once "vendor/autoload.php";

use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/app/Entities");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'mysql',
    'user'     => 'root',
    'password' => 'itS_4_hoax',
    'dbname'   => 'Twitterbot',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
try {
    $entityManager = EntityManager::create($dbParams, $config);
} catch (ORMException $e) {
}
