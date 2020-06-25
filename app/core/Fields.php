<?php


class Fields
{
    public static function sanitize($data)
    {
        return htmlentities($data, ENT_QUOTES, 'UTF-8');
    }

    public static function get($input)
    {
        if(isset($_POST[$input]))
        {
            return self::sanitize($_POST[$input]);
        }
        else if(isset($_GET[$input]))
        {
            return self::sanitize($_GET[$input]);
        }
    }
}