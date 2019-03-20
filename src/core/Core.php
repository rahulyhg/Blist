<?php

namespace Blist\Core;

use Blist\Controller\AppController;
use Blist\Controller\UserController;
use Blist\Service\SecurityService;

require_once __DIR__ . '/../../config.php';

class Core
{
    public function __construct()
    {
        SecurityService::init();
        Database::init();

        $this->dispatch();
    }

    private function dispatch()
    {
        /** @var View $response */
        $response = call_user_func($this->getRequestData());
        if ($response) {
            $response->render();
        }
    }

    private function getRequestData()
    {
        if (!isset($_GET['action']) || !isset($_GET['controller'])) {
            return [AppController::class, 'indexAction'];
        }

        if (in_array($_GET['controller'], \Config::$securedControllers) && !SecurityService::getUser()) {
            View::setFlash('error', 'You need login!');
            return [UserController::class, 'loginAction'];
        }

        $controller = 'Blist\\Controller\\' . $_GET['controller'] . 'Controller';
        $action = $_GET['action'] . 'Action';

        if (!class_exists($controller) || !method_exists($controller, $action)) {
            return [AppController::class, 'error404Action'];
        }

        return [$controller, $action];
    }
}

