<?php

$module = $_GET["module"] ?? null;
$action = $_GET["action"] ?? null;

switch ($module) {
    case 'user':
        switch ($action) {
            case 'list':
                require_once("./views/users/list.php");
                break;
            
            case 'create':
                require_once("./views/users/process.php");
                require_once("./views/users/create.php");
                break;

        }

        break;
    
    default:
        require_once("index.php");
        break;
}
