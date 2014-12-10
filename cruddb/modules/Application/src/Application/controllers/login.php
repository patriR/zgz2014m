<?php

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
           // Conectarse al DBMS
           $link = mysqli_connect($config['database']['host'],
               $config['database']['user'],
               $config['database']['password']);
           // Seleccionar la DB
           mysqli_select_db($link, $config['database']['database']);
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
               header("Location: /error");
           }
       
       }
       else 
       {
           include('../modules/Application/src/Application/views/login/index.phtml');
       }
        
       break;
       
}
