<?php 

class Errorlogs{

    public static function showlog($name="", $msg="", $class="alert alert-success")// Third parameter can be change base on the error mode(danger,warning,success)
    {
        if(!empty($name))
        {

            if(!empty($msg) && empty($_SESSION[$name]))
            {

                if(!empty($_SESSION[$name])){
                    
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name.'_class'])){

                    unset($_SESSION[$name.'_class']);
                }

                $_SESSION[$name] =$msg;

                $_SESSION[$name.'_class'] = $class;

            }
            elseif(empty($msg) && !empty($_SESSION[$name]))
            {

                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';

                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';

                unset($_SESSION[$name]);

                unset($_SESSION[$name.'_class']);

                session_destroy();
            }
        }
    }
    
}