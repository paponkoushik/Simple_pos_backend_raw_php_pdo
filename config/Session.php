<?php


namespace App\Config;


class Session
{
    public static function init()
    {
        session_start();
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return false;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function destroy()
    {
        session_unset();
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }
}