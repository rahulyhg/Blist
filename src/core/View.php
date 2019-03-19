<?php

namespace Blist\Core;

use Blist\Entity\UserEntity;
use Blist\Service\SecurityService;

class View
{
    /** @var \stdClass */
    private $params;

    /** @var string */
    private $path;

    public function __construct($path, $parameters = [], $code = 200)
    {
        http_response_code($code);
        $this->params = (object) $parameters;
        $this->path = $path;
    }

    public function render()
    {
        /** @noinspection PhpIncludeInspection */
        require_once $this->path;
    }

    public function url($controller, $action)
    {
        return \Config::$url . "/index.php?controller=$controller&action=$action";
    }

    public static function Redirect($controller, $action, $query = '')
    {
        header('Location: '.\Config::$url . "/index.php?controller={$controller}&action={$action}{$query}");
        return null;
    }

    /**
     * @param string $type
     * @param string $message
     */
    public static function setFlash($type, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }

        $_SESSION['flash'][] = [$type, $message];
    }

    /**
     * @return array
     */
    public static function getFlashes()
    {
        $flashes = $_SESSION['flash'] ?? [];
        $_SESSION['flash'] = [];
        return $flashes;
    }

    public function asset($url)
    {
        return \Config::$url . '/' . $url;
    }

    /**
     * @return UserEntity|null
     */
    public function getUser()
    {
        return SecurityService::getUser();
    }
}