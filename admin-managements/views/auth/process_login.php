<?php 
    $email = $password = '';
    $errEmail = $errPassWord = $errMessage = '';

    if(isset($_POST['btn-login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$email) {
            $errEmail = 'Vui lòng nhập email của bạn';
        }

        if(!$password) {
            $errPassWord = 'Vui lòng nhập mật khẩu';
        }

        if($email && $password) {
            if($email === 'admin@gmail.com' && $password === '123123') {
                // email: admin@gmail.com && pass: 123123
                // Login thành công
                $_SESSION['user'] = [
                    'email' => $email,
                    'name' => 'Administrator',
                ];

                header('location: admin-management.php?module=product');
                return;
            }

            $errMessage = 'Email hoặc mật khẩu không chính xác';
        }
    }
?>