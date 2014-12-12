<?php

include_once '../modules/Core/src/Forms/models/validateForm.php';
include_once '../modules/Core/src/Forms/models/filterForm.php';
include_once '../modules/Core/src/Forms/models/renderForm.php';
include_once '../modules/Application/src/Application/forms/userdeleteForm.php';
include_once '../modules/Application/src/Application/forms/userForm.php';
include_once '../modules/Application/src/Application/models/fetchUser.php';
include_once '../modules/Application/src/Application/models/createUser.php';
include_once '../modules/Application/src/Application/models/updateUser.php';
include_once '../modules/Application/src/Application/models/deleteUser.php';
include_once '../modules/Application/src/Application/models/hydrateUser.php';

<<<<<<< HEAD
=======
<<<<<<< HEAD
$validActions = array ('insert', 'update', 'delete', 'select');
=======
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
include_once '../modules/Application/src/Application/models/uuid.php';


$validActions = array ('insert', 'update', 'delete', 'select', 'uuid');
<<<<<<< HEAD
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b

>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98

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
                createUser($filter, $_FILES['photo']['name']);               
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
                $userData=fetchUser($request['params']['id']); 
                $userData[0]=$request['params']['id'];
                $values = hydrateUser($userData);               
                // Cargar el formulario con datos
                include('../modules/Application/src/Application/views/users/update.phtml');
            }  
    break;
    default:
    case 'select':
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
        $data = explode("\n", $data);
        include ("../modules/Application/src/Application/views/users/select.phtml");
    break;
    case 'delete':
        if($_POST)
        {
            $filter = filterForm($userdeleteForm, $_POST);
            $valid = validateForm($userdeleteForm, $filter);
            if($valid['valid'] && $_POST['borrar']=='Si')
                deleteUser($filter['id']);
             
            header("Location: /users/select");
        }
        else
        {
            $userData=fetchUser($request['params']['id']);
            $userData[0]=$request['params']['id'];
            $values = hydrateUser($userData);
            $private_key='962d52aca6a17be6185267ef085de20e4ae3fc637944a01c4ea38057dc4cc7ab';
            $values['token']=hash('sha256', $_SERVER['SERVER_ADDR'].$private_key);
    
            include('../modules/Application/src/Application/views/users/delete.phtml');
        }
    break;
    case 'uuid':
       $uuid = uuid_v4();
       
       include('../modules/Application/src/Application/views/users/uuid.phtml');
    
    break;
    
}