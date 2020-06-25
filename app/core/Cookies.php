<?php 

class Cookies 
{
    public static function set($name, $value, $exp)
    {
        return(setcookie($name, $value, time()+$exp, '/')) ? true : false;
    }

    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    public static function exists($name)
    {
        return isset($_COOKIE[$name]) ? true : false;
    }

    public static function delete($name)
    {
        self::set($name, '', time() -1);
    }

}