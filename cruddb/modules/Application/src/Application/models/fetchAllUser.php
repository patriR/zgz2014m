<?php

function fetchAllUser($config)
{
    switch ($config['repository'])
    {
        case 'txt':
            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            $data = explode("\n", $data);
            return $data;
        break;
        case 'db':
            echo "<pre>";
            print_r($config);
            echo "</pre>";
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'], $config['database']['user'], $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // SELECT * FROM users;
            $sql = "SELECT * FROM users";
            // Retornar el data
            $result = mysqli_query($link,$sql);
            
            while($row = mysqli_fetch_assoc($result))
            {
                $users[] = implode('|',$row);
            }
            
            return $users;
        break;
        case 'gd':
        break;
        
    }
   
}