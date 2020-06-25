<?php


class View
{
    /**
     * Views constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $name
     * @param array $data
     */
    protected function renderView($name, $data=[])
    {
        if(file_exists('views/' . $name . '.php'))
        {
            require_once (ROOT.DS.'views'.DS.'includes' . DS . 'header.php');

            require_once (ROOT.DS.'views'.DS.'includes' . DS . 'navigation.php');

            require_once 'views/'.$name. '.php';

            require_once (ROOT.DS.'views'.DS.'includes' . DS . 'footer.php');
        }
        else
        {
            die('Page Not found');
        }
    }
}