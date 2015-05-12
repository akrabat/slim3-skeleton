<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../app/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../app/dependencies.php';

// Register middleware
// e.g: $app->add(new \Slim\Csrf\Guard);

// Register routes
require __DIR__ . '/../app/routes.php';

// Run!
$app->run();
