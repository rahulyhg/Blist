<?php

namespace Blist\Core;

use PDO;
use PDOException;

class Database
{
    /** @var PDO */
    public static $connection = null;

    public static function init()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO(\Config::$dbHost, \Config::$dbUser, \Config::$dbPass);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }
    }
}