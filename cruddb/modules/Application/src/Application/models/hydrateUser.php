<?php

function hydrateUser($config,$usuario)
{
    switch ($config['repository'])
    {
        case 'txt':
        $values = array ('id'=>$usuario[0],
            'lastname'=>$usuario[1],
            'name'=>$usuario[2],
            'password'=>$usuario[3],
            'email'=>$usuario[4],
            'description'=>$usuario[5],
            'gender'=>$usuario[6],
            'city'=>$usuario[7],
            'pets'=>explode(',',$usuario[8]),
            //'languages'=>(strpos($usuario[8],',')!==FALSE)?explode(',',$usuario[8]):$usuario[8],
            'languages'=>explode(',',$usuario[9]),
            'photo'=>$usuario[11]);
        return $values;
    break;
     case 'db':
         //Hacer un nuevo userForm para BD
         $values = array ('id'=>$usuario['iduser'],
             'lastname'=>$usuario['lastname'],
             'name'=>$usuario['name'],
             'password'=>$usuario['password'],
             'email'=>$usuario['email'],
             'description'=>$usuario['description'],
             'gender'=>$usuario['gender'],
             'city'=>strtolower($usuario['city']),
             'pets'=>$usuario['pet'],
             'languages'=>$usuario['language'],
             'photo'=>$usuario['photo']);
           
            /*
            echo "<pre>";
            print_r($values);
            echo "</pre>";*/
            return $values;
            break;
        case 'gd':
            break;
    }
}