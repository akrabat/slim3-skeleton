<?php
namespace App\Action;

final class HomeAction
{
    private $view;
    private $logger;

    public function __construct($view, $logger)
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
