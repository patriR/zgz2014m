<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
switch ($request['action']){
    case 100: $text = 'Continue'; break;
    case 101: $text = 'Switching Protocols'; break;
    case 200: $text = 'OK'; break;
    case 201: $text = 'Created'; break;
    case 202: $text = 'Accepted'; break;
    case 203: $text = 'Non-Authoritative Information'; break;
    case 204: $text = 'No Content'; break;
    case 205: $text = 'Reset Content'; break;
    case 206: $text = 'Partial Content'; break;
    case 300: $text = 'Multiple Choices'; break;
    case 301: $text = 'Moved Permanently'; break;
    case 302: $text = 'Moved Temporarily'; break;
    case 303: $text = 'See Other'; break;
    case 304: $text = 'Not Modified'; break;
    case 305: $text = 'Use Proxy'; break;
    case 400: $text = 'Bad Request'; break;
    case 401: $text = 'Unauthorized'; break;
    case 402: $text = 'Payment Required'; break;
    case 403: $text = 'Forbidden'; break;
    case 404: $text = 'Not Found'; break;
    case 405: $text = 'Method Not Allowed'; break;
    case 406: $text = 'Not Acceptable'; break;
    case 407: $text = 'Proxy Authentication Required'; break;
    case 408: $text = 'Request Time-out'; break;
    case 409: $text = 'Conflict'; break;
    case 410: $text = 'Gone'; break;
    case 411: $text = 'Length Required'; break;
    case 412: $text = 'Precondition Failed'; break;
    case 413: $text = 'Request Entity Too Large'; break;
    case 414: $text = 'Request-URI Too Large'; break;
    case 415: $text = 'Unsupported Media Type'; break;
    case 500: $text = 'Internal Server Error'; break;
    case 501: $text = 'Not Implemented'; break;
    case 502: $text = 'Bad Gateway'; break;
    case 503: $text = 'Service Unavailable'; break;
    case 504: $text = 'Gateway Time-out'; break;
    case 505: $text = 'HTTP Version not supported'; break;
    default:
        exit('Unknown http status code "' . htmlentities($request['action']) . '"');
        break;

}
http_response_code($request['action']);
echo "Error ". $request['action'] .": ". $text;

<<<<<<< HEAD
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
