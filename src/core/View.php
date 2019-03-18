<?php

namespace Blist\Core;

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

    protected function url($controller, $action)
    {
        return \Config::$url . "/index.php?controller=$controller&action=$action";
    }

    protected function asset($url)
    {
        return \Config::$url . '/' . $url;
    }
}