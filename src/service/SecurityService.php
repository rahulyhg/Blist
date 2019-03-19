<?php

namespace Blist\Service;

use Blist\Repository\UserRepository;

class SecurityService
{
    public static function init()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function login($usernameOrEmail, $password)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->findOneByUsername($usernameOrEmail);

        if (!$user) {
            return [false, 'User not found!'];
        }

        if (!password_verify($password, $user->getPassword())) {
            return [false, 'Wrong password!'];
        }

        $_SESSION['user'] = $user;

        return [true, ''];
    }

    public static function getUser()
    {
        return $_SESSION['user'] ?? null;
    }
}