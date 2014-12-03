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

function parseURL($data)
{
    $result = array();
    include_once '../modules/Application/src/Application/controllers/lista.php';
    
    if(sizeof($data) >= 2)
    {
        //Se accede al directorio raiz, controlador y accion por defecto
        $result = array ('controller'=>'users',
            'action'=>'select'
        );
    } 
    elseif(in_array($data[1],$validControllers))
    {//Pertenece a la colección de controladores
        $result = array ('controller'=>$data[1]);
        //Comprobar la acción, en la colección de acciones válidas del controlador
        include_once '../modules/Application/src/Application/controllers/users.php';
        //No lee el fichero users.php, las pongo aquí
        
        //Si la acción está en el array de acciones del controlador, es válida
        if(sizeof($data) == 2)
        {
            //Acción por defecto para el controlador ($default de users.php)
            $result['accion']= 'select';
        }
        elseif(in_array($data[2],$validActions[$data[1]]))
        {
            //Parámetros de la acción
            if(sizeof($data)%2 == 0){
                //Hay algún parámetro sin valor
                $result = array ('controller'=>'error',
                    'action'=>'405'
                );
            }
            else{
                $result['accion']= $data[2];
                $i=3;
                while($i < sizeof($data))
                {
                    //Indice impar, nombre del parámetro
                    //Indice par, valor del parámetro
                    $result['params'][$data[$i]]= $data[$i+1];
                    $i++;
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