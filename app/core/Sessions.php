<?php

class Sessions
{
    public static function exists($name)
    {
        return(isset($_SESSION[$name]))? true : false;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function delete($name)
    {
        if(self::exists($name))
        {
            session_unset();

            unset($_SESSION[$name]);
            
            session_destroy().time();
        }
    }

    public static function uagent_no_version()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];

        $regx = '/\/[a-zA-Z0-9.]+/';
        
        return preg_replace($regx,'', $agent);
    }
}