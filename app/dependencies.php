<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$view = new \Slim\Views\Twig(
    $app->settings['view']['template_path'],
    $app->settings['view']['twig']
);
$view->addExtension(new Twig_Extension_Debug());
$view->addExtension(new \Slim\Views\TwigExtension($app->router, $app->request->getUri()));
$container['view'] = $view;

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c['view'], $c['logger']);
};
