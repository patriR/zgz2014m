<?php

include_once '../modules/Core/src/Forms/models/validateForm.php';
include_once '../modules/Core/src/Forms/models/filterForm.php';
include_once '../modules/Core/src/Forms/models/renderForm.php';
include_once '../modules/Application/src/Application/forms/userdeleteForm.php';
include_once '../modules/Application/src/Application/forms/userForm.php';
include_once '../modules/Application/src/Application/models/fetchUser.php';
include_once '../modules/Application/src/Application/models/fetchAllUser.php';
include_once '../modules/Application/src/Application/models/createUser.php';
include_once '../modules/Application/src/Application/models/updateUser.php';
include_once '../modules/Application/src/Application/models/deleteUser.php';
include_once '../modules/Application/src/Application/models/hydrateUser.php';
include_once '../modules/Application/src/Application/models/uuid.php';


$validActions = array ('insert', 'update', 'delete', 'select');

switch ($request['action'])
{
    case 'insert':        
        if($_POST)
        {
            $filter = filterForm($userForm, $_POST);           
            $valid = validateForm($userForm, $filter);
            if($valid['valid'])
            {
                //Insertar en el repositorio
                move_uploaded_file($_FILES['photo']['tmp_name'], 
                                   $_SERVER['DOCUMENT_ROOT']."/uploads/".$_FILES['photo']['name']);                

                createUser($filter, $_FILES['photo']['name'], $config);               
                header("Location: /users/select");
            }            
        }   
        else
        {
            include('../modules/Application/src/Application/views/users/insert.phtml');
        }  
    break;
    case 'update':      
        // Si POST
        if($_POST)
        {
            $filter = filterForm($userForm, $_POST);
            $valid = validateForm($userForm, $filter);
            if($valid['valid'])
            {

                $filter['id']=$_POST['id'];
                updateUser($filter, $config);
            }                        
            // Ir al select
            header("Location: /users/select"); 
        }
        // Si no POST
        // Cargar el formulario con datos
        else 
        {               
            $values = fetchUser($config, $request['params']['id']); 
            //$userData[0] = $request['params']['id'];
            //$values = hydrateUser($userData);               
            // Cargar el formulario con datos
            include('../modules/Application/src/Application/views/users/update.phtml');
        }  

    break;
    default:
    case 'select':
        $data = fetchAllUser($config);       
            // Si POST
            if($_POST)
            {
                    $filter = filterForm($userForm, $_POST);
                    $valid = validateForm($userForm, $filter);
                    if($valid['valid'])
                    {
                        $data = $filter;
                        $data['id']=$_POST['id'];
                        updateUser($data);
                    }                        
                    // Ir al select
                    header("Location: /users/select"); 
            }
            // Si no POST
            // Cargar el formulario con datos
            else 
            {               
                $userData=fetchUser($config,$request['params']['id']); 
                $values = hydrateUser($config,$userData);               
                // Cargar el formulario con datos
                include('../modules/Application/src/Application/views/users/update.phtml');
            }  
    break;
    default:
    case 'select':
        $data = fetchAllUser($config);
        include ("../modules/Application/src/Application/views/users/select.phtml");
    break;
    case 'delete':       
        if($_POST)
        {            
            $filter = filterForm($userdeleteForm, $_POST);
            $valid = validateForm($userdeleteForm, $filter);
            if($valid['valid'] && $_POST['borrar']=='Si')
            deleteUser($config,$filter['id']);            
            header("Location: /users/select");            
        }        
        else 
        {        
            $userData=fetchUser($config, $request['params']['id']);
            $userData[0]=$request['params']['id'];

            deleteUser($filter['id']);            
           
            header("Location: /users/select");            
        }           
    break;
}