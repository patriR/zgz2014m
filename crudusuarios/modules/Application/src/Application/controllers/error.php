<?php

/**
 * Controlador de errores
 * 
 */

switch ($request['action'])
{
    case 404:
        //Recurso no encontrado: controlador o acci�n
        header('HTTP/1.1 404 Not found');
        include ("../modules/Application/src/Application/views/errors/404.phtml");
        break;
    case 405:
        //Error de par�metro en acci�n
        header('HTTP/1.1 405 Not valid');
        include ("../modules/Application/src/Application/views/errors/405.phtml");
        break;
}