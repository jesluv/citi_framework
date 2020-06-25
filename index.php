<?php

session_start();

ob_start();

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__FILE__));

require_once('config'.DS.'configuration.php');

$url = isset($_SERVER['PATH_INFO'])? explode('/',ltrim($_SERVER['PATH_INFO'], '/')) : [];

require_once(ROOT.DS.'core'.DS.'bootstrap.php');

new Routing($url);