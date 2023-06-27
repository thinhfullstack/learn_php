<?php
    $module = $_GET['module'] ?? 'admin-management';
    $action = $_GET['action'] ?? null;

    switch ($module) {
        case 'product':
            if(!$action) {
                require_once("./admin-managements/views/products/list.php");
            } else {
                require_once("./admin-managements/views/products/{$action}.php");
            }
            break;
        case 'category':
            if(!$action) {
                require_once("./admin-managements/views/categories/list.php");
            } else {
                require_once("./admin-managements/views/categories/{$action}.php");
            }
            break;
        case 'user':
            if(!$action) {
                require_once("./admin-managements/views/users/list.php");
            } else {
                require_once("./admin-managements/views/users/{$action}.php");
            }
            break;

        default:
            require_once("./admin-management.php");
        break;  
    }
?>