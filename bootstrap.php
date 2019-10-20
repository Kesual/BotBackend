<?php

// bootstrap.php
// Include Composer Autoload (relative to project root).
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/app/Entities");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'mysqli',
    'user'     => 'root',
    'password' => 'itS_4_hoax',
    'dbname'   => 'Twitterbot',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$config->setMetadataDriverImpl(
    new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        new Doctrine\Common\Annotations\CachedReader(
            new Doctrine\Common\Annotations\AnnotationReader(),
            new Doctrine\Common\Cache\ArrayCache()
        ),
        $paths
    )
);

$entityManager = EntityManager::create($dbParams, $config);
