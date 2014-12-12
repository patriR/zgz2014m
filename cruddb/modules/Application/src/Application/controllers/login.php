<?php

<<<<<<< HEAD
/**
 * Controlador de las funciones de autenticación y logout de usuarios.
 * 
 * @param array $request using $request['action']
 * 
 */
echo "<pre>";
print_r($_POST);
echo "</pre>";

switch ($request['action'])
{
   case 'logout':
        unset($_SESSION['email']);
        session_regenerate_id();
        header("Location: /home/select");
        exit();
   break;
   case 'index':
       if($_POST)
       {
=======
switch ($request['action']){
    
    case 'logout':
        unset($_SESSION['email']);
        session_regenerate_id();
        header("Location: /home/select");
        break;
        
   case 'index':
       if($_POST)
       {
           echo $_POST['inputEmail'];
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
           // Conectarse al DBMS
           $link = mysqli_connect($config['database']['host'],
               $config['database']['user'],
               $config['database']['password']);
           // Seleccionar la DB
           mysqli_select_db($link, $config['database']['database']);
<<<<<<< HEAD
           // SELECT * FROM users WHERE id;
           	
           $sql = "SELECT iduser, name, email FROM users
                WHERE password = '".$_POST['password']."' 
                AND email ='".$_POST['email']."'";
                 
           // Retornar el data
           $result = mysqli_query($link, $sql);
           echo mysqli_num_rows($result);
           if(mysqli_num_rows($result)===1)
           {
               session_regenerate_id();
               $_SESSION['email']=$_POST['email'];
               
              header("Location: /users/select");
           }
           else
           {
               header("Location: /login/index");
           }                   
=======
           // SELECT * FROM users;
           $sql = "SELECT * FROM users WHERE email='".$_POST['inputEmail']."' and password='".$_POST['inputPassword']."'";
           $result = mysqli_query($link, $sql);
           if (mysqli_num_rows($result)===1)
           {
               //Existe el usuario
               session_regenerate_id();
               $_SESSION['email'] = $_POST['inputEmail'];
               header("Location: /users/select");
           } else
           {
               header("Location: /login/index");
           }
       
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
       }
       else 
       {
           include('../modules/Application/src/Application/views/login/index.phtml');
       }
<<<<<<< HEAD
       
   break;
=======
        
       break;
       
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98
}
