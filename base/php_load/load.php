<?=
    // Xử lý toàn bộ load layout content 

    $moduleName = $_GET['module'] ?? 'laptop';

    switch ($moduleName) {
        case 'laptop':
            require_once("./views/laptops/index.php");
            break;
        case 'printer':
            require_once("./views/printes/index.php");
            break;
        case 'mobile':
            require_once("./views/mobiles/index.php");
            break;
        case 'fax':
            require_once("./views/faxs/index.php");
            break;

        default:
            require_once("./views/laptops/index.php");
            break;
    }

?>