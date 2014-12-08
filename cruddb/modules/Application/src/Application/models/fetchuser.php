<?php

/**
 * Fetch user by id
 * @param int $id
 * @return array
 */


/*$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
    // Dividir por saltos de linea
    $data = explode("\n", $data);
    // Leer la fila ID
    $usuario = $data[$id];
    $usuario = explode("|", $usuario);*/
function fetchUser($config,$id)
{
    switch ($config['repository'])
    {
        case 'txt':
            // Leer los datos del usuario por ID
            // Leer todos los datos
            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            // Dividir por saltos de linea
            $data = explode("\n", $data);
            // Leer la fila ID
            $usuario = $data[$id];
            $usuario = explode("|", $usuario);
            return $usuario;
            break;
            
        case 'db':
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'], $config['database']['user'], $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // SELECT * FROM users WHERE iduser=$id;
            $sql = "SELECT users.*, gender, city, pet, language FROM users" ;
            $sql .= " LEFT JOIN genders ON idgender = genders_idgender ";
            $sql .= " LEFT JOIN cities ON idcity = cities_idcity";
            $sql .= " LEFT JOIN users_has_pets ON users_has_pets.users_iduser = users.iduser";
            $sql .= " LEFT JOIN pets ON users_has_pets.pets_idpet = pets.idpet ";
            $sql .= " LEFT JOIN users_has_languages ON users_has_languages.users_iduser = users.iduser";
            $sql .= " LEFT JOIN languages ON languages_idlanguage = languages.idlanguage WHERE users.iduser =".$id;
            // Retornar el data
            $result = mysqli_query($link,$sql);
            if (mysqli_num_rows($result) == 0) {
                echo "No se han encontrado datos";
                exit;
            }
          
            $user = mysqli_fetch_assoc($result);
            $user['pet'] = array();
            $user['language'] = array();
            
            while($row = mysqli_fetch_assoc($result))
            {
                if(isset($row['pet']) && !in_array(strtolower($row['pet']), $user['pet']))
                    $user['pet'][] = strtolower($row['pet']);
                if(isset($row['language']) && !in_array(strtolower($row['language']), $user['language']))
                    $user['language'][] = strtolower($row['language']);
            }
           
            return $user;
            break;
            
        case 'gd':
            break;
    }

}