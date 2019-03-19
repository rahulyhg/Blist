<?php

namespace Blist\Controller;

use Blist\Core\View;
use Blist\Service\SecurityService;

class UserController
{
    public function loginAction()
    {
        return new View(__DIR__ . '/../template/action/login.php');
    }

    public function logoutAction()
    {
        SecurityService::logout();
        return View::Redirect('App', 'index');
    }

    public function loginSubmitAction()
    {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$username || !$password) {
            View::setFlash('error', 'Form not valid!');
            return View::Redirect('User', 'login');
        }

        $result = SecurityService::login($username, $password);

        if ($result[0]) {
            return View::Redirect('App', 'index');
        } else {
            View::setFlash('error', $result[1]);
            return View::Redirect('User', 'login');
        }
    }
}