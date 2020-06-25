<?php
class Routing
{
    public function __construct($url)
    {
        $this->root($url);
    }

    protected static function root($url)
    {
        // dnd($url);

        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;

        $controller_name = $controller;

        array_shift($url);

        // action

        $action = (isset($url[0]) && $url[0] != '') ? $url[0].'Citi' : DEFAULT_METHOD; // append (Citi) to all your Controller method names


        array_shift($url);

        // params

        $query_params = $url;

        $dispatch = new $controller($controller_name, $action);

        if(method_exists($controller, $action))
        {
            // $controller->renderModel($action);

            call_user_func_array([$dispatch, $action], $query_params);
        }
        else
        {
            die("The method ".$controller_name." does not exist");
        }
    }

    public static function switchProduct($location)
    {
        if(!headers_sent()) 
        {
            header('Location:'.URL.$location);
            exit;
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.URL.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0,url='.$location.'"/>';
            echo '</noscript>';exit;
        }
    }
}