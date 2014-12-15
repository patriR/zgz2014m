<?php
namespace Application\controllers;

class Home
{
    public $layout='home.phtml';
    public function select()
    {
        
    }
    
    public function login()
    {
        // Send to authentication controller with login action
        header("Location: /authentication/login");
    }
    
}
