<?php
declare(strict_types=1);

use jobiq\ServiceProvider\DependencyProvider;
use jobiq\ServiceProvider\AppProvider;
use jobiq\ServiceProvider\MonologProvider;
use Slim\Container;

require_once __DIR__ . '/../../vendor/autoload.php';

define('APP_ROOT', __DIR__ . '/../../');

$container = new Container(require __DIR__ . '/settings.php');

// register service providers
$container
    ->register(new DependencyProvider())
    ->register(new AppProvider())
    ->register(new MonologProvider());

return $container;