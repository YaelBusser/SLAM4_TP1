<?php


namespace utils;


class SessionHelpers
{
    static function init()
    {
        session_start();
    }

    static function login($user)
    {
        $_SESSION['user'] = $user;
    }

    static function logout()
    {
        unset($_SESSION['user']);
    }

    static function getConnected()
    {
        if (SessionHelpers::isLogin()) {
            return $_SESSION['user'];
        } else {
            return array();
        }
    }

    static function isLogin()
    {
        return isset($_SESSION['user']);
    }
}