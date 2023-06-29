<?php 
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    $name = $price = $feature_image = '';
    $errName = $errPrice = $errFile = '';

    if(isset($_POST['btn-product']))  {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $file = isset($_POST['file']);

        if(!$name) {
            $errName = 'Vui lòng nhập tên sản phẩm';
        }

        if(!$price) {
            $errPrice = 'Vui lòng nhập giá sản phẩm';
        } else if(!is_numeric($price)) {
            $errPrice = 'Giá sản phẩm phải là số là số';
        }

        if(!$file) {
            $errFile = 'Vui lòng chọn ảnh sản phẩm';
        }

        if($name && $price) {
            if(empty($_FILES['file']['name'])) {
                $errFile = 'Vui lòng chọn ảnh đại diện';
            } 
            
            $fileName = time() . "_" . $_FILES['file']['name'];
            $targetPath = "./assets/images_product/" . $fileName;
        
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
            
            echo "<img src='./assets/images_product/". $fileName ."' width='150' />";

            $products = [
                'id'    => count($_SESSION['products']) + 1,
                'name'  => $name,
                'price' => $price,
                'file'  => $targetPath
            ];

            $_SESSION['products'][] = $products;

            header('location:admin-management.php?module=product&action=list');
            exit();
        }
    }

?>