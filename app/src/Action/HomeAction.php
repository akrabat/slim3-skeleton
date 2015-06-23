<?php
namespace App\Action;

use Slim\Views\Twig;
use Monolog\Logger;

final class HomeAction
{
    private $view;
    private $logger;

    public function __construct(Twig $view, Logger $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function dispatch($request, $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $this->view->render($response, 'home.twig');
        return $response;
    }
}
