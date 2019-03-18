<?php

namespace Blist\Controller;

use Blist\Core\View;
use Blist\Repository\UserRepository;

class AppController
{
    public function indexAction()
    {
        $userRepository = new UserRepository();

        return new View(__DIR__ . '/../template/action/index.php', [
            'users' => $userRepository->findAll()
        ]);
    }

    public function postAction()
    {
        return new View(__DIR__ . '/../template/action/post.php');
    }

    public function error404Action()
    {
        return new View(__DIR__ . '/../template/action/404.php');
    }
}