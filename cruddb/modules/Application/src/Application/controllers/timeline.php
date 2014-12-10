<?php

include_once '../modules/Core/src/Forms/models/validateForm.php';
include_once '../modules/Core/src/Forms/models/filterForm.php';
include_once '../modules/Core/src/Forms/models/renderForm.php';
include_once '../modules/Application/src/Application/models/uuid.php';

$validActions = array ('select');

switch ($request['action'])
{
    default:
    case 'select':     
        include ("../modules/Application/src/Application/views/timeline/select.phtml");
    break;
    case 'insert':
        include ("../modules/Application/src/Application/views/timeline/insert.phtml");
        break;
    case 'update':
        include ("../modules/Application/src/Application/views/timeline/update.phtml");
        break;
    case 'delete':
        include ("../modules/Application/src/Application/views/timeline/delete.phtml");
        break;
}

