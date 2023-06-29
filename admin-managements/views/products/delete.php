<?php 
    $productID = $_GET['id'] ?? '';

    $productExists = false;
    
    foreach ($_SESSION['products'] as $index => $product) {
        if ($product['id'] == $productID) { // Kiểm tra 
            $productExists = true;
            unset($_SESSION['products'][$index]);
            break;
        }
    }

    if ($productExists) {
        // Cập nhật lại ID của các sản phẩm còn lại
        $newProducts = array_values($_SESSION['products']);
        foreach ($newProducts as $index => $product) {
            $newProducts[$index]['id'] = $index + 1;
        }
        $_SESSION['products'] = $newProducts;

        header("Location: admin-management.php?module=product&action=list");
        exit();
    } else {
        echo '<h1>Sản phẩm không tồn tại</h1>';
    }

?>
