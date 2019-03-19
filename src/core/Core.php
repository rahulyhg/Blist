<?php

namespace Blist\Core;

use Blist\Controller\AppController;
use Blist\Service\SecurityService;

require_once __DIR__ . '/../../config.php';

class Core
{
    public function __construct()
    {
        SecurityService::init();
        Database::connect();
        $this->dispatch();
    }

    private function dispatch()
    {
        /** @var View $response */
        $response = call_user_func($this->getRequestData());
        $response->render();
    }

    private function getRequestData()
    {
        if (!isset($_GET['action']) || !isset($_GET['controller'])) {
            return [AppController::class, 'error404Action'];
        }

        $controller = 'Blist\\Controller\\' . $_GET['controller'] . 'Controller';
        $action = $_GET['action'] . 'Action';

        if (!class_exists($controller) || !method_exists($controller, $action)) {
            return [AppController::class, 'error404Action'];
        }

        return [$controller, $action];
    }
}

