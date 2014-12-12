<?php

function moduleManager($configfile)
{
    include_once $configfile;
    
    $globalConfig=array();
    $localConfig=array();
      
    foreach($config['modules'] as $module)
    {   
<<<<<<< HEAD
    $globalFile = __DIR__.'/../../../../../configs/autoload/'.strtolower($module).'.global.php';
=======
        $globalFile = __DIR__.'/../../../../../configs/autoload/'.strtolower($module).'.global.php';
>>>>>>> 8e1802732c9b668569f6966005d85dbf58da2f98

        if(file_exists($globalFile))
        {
            include_once $globalFile;
            $globalConfig = $config;
        }
        
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