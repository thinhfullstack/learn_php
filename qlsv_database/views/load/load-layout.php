<?php

require("./views/load/Models/Model.php");
require("./views/load/Models/User.php");

$module = $_GET["module"] ?? null;
$action = $_GET["action"] ?? null;

switch ($module) {
    case 'user':
        $userModel = new User;
        $users = $userModel->getAll();
        
        switch ($action) {
            case 'list':
                require_once("./views/users/list.php");
                break;
            
            case 'create':
                require_once("./views/users/process.php");
                require_once("./views/users/create.php");
                break;
            
            case 'edit':
                require_once("./views/users/process.php");
                require_once("./views/users/edit.php");
                break;

        }

        break;
    
    default:
        require_once("index.php");
        break;
}
