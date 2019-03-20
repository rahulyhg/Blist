<?php

namespace Blist\Controller;

use Blist\Core\View;

class ListController
{
    public function indexAction()
    {
        return new View(__DIR__ . '/../template/action/listIndex.php');
    }
}