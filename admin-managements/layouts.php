<?php
    $module = $_GET['module'] ?? 'admin-management';
    $action = $_GET['action'] ?? null;

    /* Thực hiện cho việc khi đã login vào hệ thống thì 
        sẽ ngăn chặn việc ra khỏi màn Home để quay lại login
        -> Trừ khi ta phải logout
    */
    if($action === 'login' && !empty($_SESSION['user'])) {
        header('location: admin-management.php?module=product');
    }

    /* Thực hiện cho việc khi đã logout thoát khỏi hệ thống thì 
        sẽ không điều hướng quay trở lại vào hệ thống được.
        -> Muốn vào được ta phải login
    */
    if($module != 'auth' && empty($_SESSION['user'])) {
        header('location: admin-management.php?module=auth&action=login');
    }
    
    switch ($module) {
        case 'product':
            switch ($action) {
                case 'list':
                    require_once("./admin-managements/views/products/list.php");
                    break;
                case 'create':
                    require_once("./admin-managements/views/products/pr_process.php");
                    require_once("./admin-managements/views/products/create.php");
                    break;
                case 'edit':
                    require_once("./admin-managements/views/products/pr_process.php");
                    require_once("./admin-managements/views/products/edit.php");
                    break;
                case 'delete':
                    require_once("./admin-managements/views/products/delete.php");
                    break;

                default:
                    require_once("./admin-managements/views/products/list.php");
                    break;
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
            switch ($action) {
                case 'list':
                    require_once("./admin-managements/views/users/list.php");
                    break;
                case 'create':
                    require_once("./admin-managements/views/users/user_process.php");
                    require_once("./admin-managements/views/users/create.php");
                    break;
                case 'edit':
                    require_once("./admin-managements/views/users/user_process.php");
                    require_once("./admin-managements/views/users/edit.php");
                    break;
                case 'delete':
                    require_once("./admin-managements/views/users/delete.php");
                    break;
                
                default:
                    require_once("./admin-managements/views/users/list.php");
                    break;
            }
            break;

        case 'auth':
            if($action == 'login') {
                require_once("./admin-managements/views/auth/process_login.php");
                require_once("./admin-managements/views/auth/login.php");
            }
            if($action == 'logout') {
                require_once("./admin-managements/views/auth/logout.php");
            }

            break;
        case 'upload': 
            if(!$action) {
                require_once("./admin-managements/views/upload/process_upload.php");
                require_once("./admin-managements/views/upload/form.php");
            } else {
                require_once("./admin-managements/views/upload/{$action}.php");
            }
            break;

        default:
            require_once("./admin-management.php");
        break;  
    }
?>