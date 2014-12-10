<?php

function moduleManager($configfile)
{
<<<<<<< HEAD
    
    echo $configfile;
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
    include_once $configfile;
    
    $globalConfig=array();
    $localConfig=array();
      
    foreach($config['modules'] as $module)
    {   
<<<<<<< HEAD

=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
        $globalFile = __DIR__.'/../../../../../configs/autoload/'.strtolower($module).'.global.php';

        if(file_exists($globalFile))
        {
            include_once $globalFile;
            $globalConfig = $config;
        }
        
<<<<<<< HEAD

=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
        $localFile = __DIR__.'/../../../../../configs/autoload/'.strtolower($module).'.local.php';
        if(file_exists($localFile))
        {
            include_once $localFile;
            $localConfig = $config;
        }
        $config = array_replace_recursive($config, $globalConfig, $localConfig);
    }   
        
    return $config;
}