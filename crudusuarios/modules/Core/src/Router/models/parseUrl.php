<?php



/**
 * URLS validas
 *
 * /users/select/id/1/param/value/param2/value2Array
 * /users                   (controller=users, action=default)
 * /users/select            (controller=users, action=select)
 * /users/select/id/1       (controller=users, action=select)
 * /                        (controller=default, action=default)
 *
 * Invalidas (controller=error)
 * /users/select/id/1/param/value/param2    (action=405)
 * /users/select/id/1/param/                (action=405)
 * /users/select/id     (action=405)
 * /users/kaka          (action=404)
 * /kaka                (action=404)
 * /kaka/select         (action=404)
 *
 *
 *@param data array que contiene los elementos de la url
 *
 * @param result array('controller'=>,
 'action'=>,
 'params'=>array(
 'param1'=>'values1',
 'param2'=>'values2',
 ... );
* 
**/

function parseURL($url)
{
    $result = array();
    include_once '../modules/Application/src/Application/controllers/lista.php';

    if(sizeof($url) <= 2)
    {
        //Se accede al directorio raiz, controlador y accion por defecto
        $result = array ('controller'=>'users',
            'action'=>'select'
        );
    } 
    elseif(in_array($url[1],$validControllers))
    {//Pertenece a la colección de controladores
        $result = array ('controller'=>$url[1]);
        //Comprobar la acción, en la colección de acciones válidas del controlador
        //include_once '../modules/Application/src/Application/controllers/users.php';
        
        //Si la acción está en el array de acciones del controlador, es válida
        if(sizeof($url) == 2)
        {
            //Acción por defecto para el controlador ($default de users.php)
            $result['accion']= 'select';
        }
        elseif(in_array($url[2],$validActions[$result['controller']]))
        {
            //Parámetros de la acción
            if(sizeof($url)%2 == 0){
                //Hay algún parámetro sin valor
                $result = array ('controller'=>'error',
                    'action'=>'405'
                );
            }
            else{
                $result['accion']= $url[2];
                $i=3;
                while($i < sizeof($url))
                {
                    //Indice impar, nombre del parámetro
                    //Indice par, valor del parámetro
                    $result['params'][$url[$i]]= $url[$i+1];
                    $i = $i+2;
                }
            }
        }
        else
        {//No existe la acción en el controlador
            $result = array ('controller'=>'error',
                'action'=>'404'
            );
        }
    }
    else
    {
        //No es una URL válida
        $result = array ('controller'=>'error',
            'action'=>'404'
        );
    }
    
    return $result;
}