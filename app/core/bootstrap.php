<?php
/**
 * @param $className
 */
function autoloading($className)
{
    $file = ROOT.DS.'core'.DS.$className.'.php';

    $controllers = ROOT.DS.'controller'.DS.$className.'.php';

    $models = ROOT.DS.'models'.DS.$className.'.php';

    if(file_exists($file))
    {
        require_once($file);
    }
    elseif(file_exists($controllers))
    {
        require_once($controllers);
    }
    elseif(file_exists($models))
    {
        require_once($models);
    }
    else
    {
        $not_found = '
        <div>
            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1 style="text-align:center;font-size:15rem;font-family:Arial;color:#2d9add;">404</h1>
                        <h2 style="text-align:center;font-size:2rem;font-family:Arial;color:red;">Page not found!</h2>
                    </div>
                </div>
            </div>
        </div>';
        die($not_found);
    }
}

spl_autoload_register('autoloading');

