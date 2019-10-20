<?php

require_once '/Users/kevinschuette/Development/PHP_Projects/BotBackend/bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($entityManager);
