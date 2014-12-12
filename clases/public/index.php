<?php

//$data = explode('/', $_SERVER['REQUEST_URI']);
include_once '../modules/Core/src/Router/models/parseUrl.php';
include_once '../modules/Core/src/Module/models/moduleManager.php';


Session_start();

application::setConfig(__DIR__.'/../configs/global.php');
application::dispatch();

class application
{
    protected static $request;
    private static $config;
    
    public static function setConfig()
    {
       self::$request = parseURL($_SERVER['REQUEST_URI']);
       self::$config = moduleManager(__DIR__.'/../configs/global.php');
    }
    public static function dispatch()
    {
        $controllerFile = '../modules/Application/src/Application/controllers/'.self::$request['controller'].'.php';
        include_once $controllerFile;
        
        ob_start();
        //Instancio el controlador
        $controllerName = self::$request['controller'];
        $controller = new $controllerName();
        $actionName = self::$request['action'];
        $controller -> $actionName();
        $view=ob_get_contents();
        ob_end_clean();
        self::twoStep($view,$controller->layout);
    
    }
    
    public static function twoStep($view, $layout)
    {
        include_once '../modules/Application/src/Application/layouts/'.$layout;
    }
    
    public static function getConfig()
    {
        return self::$config;
    }
}


/*switch($request['controller'])
{
    default:
    case 'home':
        ob_start();
        include_once '../modules/Application/src/Application/controllers/home.php';
        $view=ob_get_contents();
        ob_end_clean();
        include_once '../modules/Application/src/Application/layouts/home.phtml';
    break;
    case 'login':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/login.php';   
        $view=ob_get_contents();
        ob_end_clean();
        include_once '../modules/Application/src/Application/layouts/signin.phtml';
    break;
    case 'users':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/users.php';
        $view=ob_get_contents();       
        ob_end_clean();

        include_once '../modules/Application/src/Application/layouts/dashboard.phtml';
        break;

    case 'error':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/error.php';
        $view=ob_get_contents();       
        ob_end_clean();
        //include_once '../modules/Application/src/Application/layouts/dashboard.phtml';
        break;
}*/

