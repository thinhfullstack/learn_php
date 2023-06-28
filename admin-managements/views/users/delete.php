<?php 
    $userID = $_GET['id'] ?? '';

    $userExists = false;
    
    foreach ($_SESSION['users'] as $index => $user) {
        if ($user['id'] == $userID) { // Kiểm tra 
            $userExists = true;
            unset($_SESSION['users'][$index]);
            break;
        }
    }

    if ($userExists) {
        // Cập nhật lại ID của các người dùng còn lại
        $newUsers = array_values($_SESSION['users']);
        foreach ($newUsers as $index => $user) {
            $newUsers[$index]['id'] = $index + 1;
        }
        $_SESSION['users'] = $newUsers;

        header("Location: admin-management.php?module=user&action=list");
        exit();
    } else {
        echo '<h1>Người dùng không tồn tại</h1>';
    }

?>