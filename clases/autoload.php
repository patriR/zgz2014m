<?php

function __autoload($class)
{
    echo $class;
    $controllerFile = '../modules/Application/src/Application/controllers/'.$class.'.php';
    include_once $controllerFile;
    
}