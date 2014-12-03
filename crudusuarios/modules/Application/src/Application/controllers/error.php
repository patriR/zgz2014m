<?php

/**
 * Controlador de errores
 * 
 */

switch ($request['action'])
{
    case 404:
        //Recurso no encontrado: controlador o acción
        header('HTTP/1.1 404 Not found');
        break;
    case 405:
        //Error de parámetro en acción
        header('HTTP/1.1 405 Not valid');
        break;
}