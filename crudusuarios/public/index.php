<?php

// echo "<pre>Post: ";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>Get: ";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>Files: ";
// print_r($_FILES);
// echo "</pre>";


$data = explode('/', $_SERVER['REQUEST_URI']);

// echo "<pre>".$_SERVER['REQUEST_URI'];
// print_r($data);
// echo "</pre>";

<<<<<<< HEAD
include_once '../vendor/generadorUUID.php';
 
/*include_once '../modules/Core/src/Router/models/parseUrl.php';

$request = parseURL($_SERVER['REQUEST_URI']);

=======
include_once '../modules/Core/src/Router/models/parseUrl.php';

$request = parseURL($_SERVER['REQUEST_URI']);

 echo "<pre> Request:" ;
 print_r($request);
 echo "</pre>";

>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
switch($request['controller'])
{
    default:
    case 'users':
        $section = 'Users';
        ob_start();
            include_once '../modules/Application/src/Application/controllers/users.php';
        $view=ob_get_contents();
        ob_end_clean();
    break;
    
    case 'generadorUUID':
        echo "generador";
        ob_start();
<<<<<<< HEAD
        include_once '../modules/Application/src/Application/controllers/generadorUUID.php';
=======
            include_once '../modules/Application/src/Application/controllers/error.php';
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
        $view=ob_get_contents();
        ob_end_clean();
        break;
    case 'error':
         $section = 'Error';
         ob_start();
         include_once '../modules/Application/src/Application/controllers/error.php';
         $view=ob_get_contents();
         ob_end_clean();
        break;
}


include_once '../modules/Application/src/Application/layouts/dashboard.phtml';
<<<<<<< HEAD
*/
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
