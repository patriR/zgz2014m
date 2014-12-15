<?php
namespace Application\controllers;
use \Core\Application;
class Login
{
    public $layout = 'signin.phtml';
    
    
    public function logout()
    {
        unset($_SESSION['email']);
        session_regenerate_id();
        header("Location: /Home/select");
        exit();
    }
    
    public function index()
    {
        if($_POST)
        {
            // Conectarse al DBMS
            
            $link = mysqli_connect(\Core\Application\Application::getConfig()['database']['host'],
                \Core\Application\Application::getConfig()['database']['user'],
                \Core\Application\Application::getConfig()['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, Application::getConfig()['database']['database']);
             
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
                 
                header("Location: /Users/select");
            }
            else
            {
                header("Location: /Login/index");
            }
        }
        else
        {
            include('../modules/Application/src/Application/views/login/index.phtml');
        }
        
    }
}
