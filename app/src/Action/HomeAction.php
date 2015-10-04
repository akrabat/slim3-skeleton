<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

final class HomeAction
{
    private $view;
    private $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function dispatch(RequestInterface $request, ResponseInterface $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $this->view->render($response, 'home.twig');
        return $response;
    }
}
