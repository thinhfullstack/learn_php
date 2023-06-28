<?php
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    $fullname = $email = $password = $phone = $address = $gender = $file = '';
    $errFullName = $errEmail = $errPWD = $errPhone = $errAddress = $errGender = $errFile = '';

    if(isset($_POST['btn-save'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $file = isset($_POST['file']);

        if (isset($_POST['btn-reset'])) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if(!$email) {
            $errEmail = 'Vui lòng nhập email để đăng ký tài khoản';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Email nhập phải đúng định dạng';
        }

        if(!$password) {
            $errPWD = 'Vui lòng nhập mật khẩu để đăng ký tài khoản';
        } else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).*$/', $password)) {
            $errPWD = 'Mật khẩu phải có cả chữ hoa và thường';
        } else if(strlen($password) < 8) {
            $errPWD = 'Mật khẩu không được nhỏ hơn 8 ký tự';
        }
 
        if(!$fullname) {
            $errFullName = 'Vui lòng nhập tên tài khoản để đăng ký đầy đủ';
        } else if(strlen($fullname) < 2) {
            $errFullName = 'Họ và tên không được nhỏ hơn 2 ký tự';
        }

        if(!$phone) {
            $errPhone = 'Vui lòng nhập số điện thoại để đăng ký tài khoản';
        } else if(!is_numeric($phone)) {
            $errPhone = 'Số điện thoại nhập phải là số';
        } else if(strlen($phone) > 10 || strlen($phone) < 10) {
            $errPhone = 'Số điện thoại nhập không vượt quá hoặc nhỏ hơn 10 ký tự';
        } 

        if(!$address) {
            $errAddress = 'Vui lòng nhập địa chỉ để đăng ký tài khoản';
        }

        if(!$gender) {
            $errGender = 'Vui lòng chọn giới tính để đăng ký tài khoản';
        }

        if(!$file) {
            $errFile = 'Vui lòng chọn ảnh đại diện để đăng ký tài khoản';
        }

        if($fullname && $email && $password && $phone && $address && $gender) {
            if (empty($_FILES['file']['name'])) {
                $errFile = 'Vui lòng chọn ảnh đại diện';
            } else {
                $fileName = time() . "_" . $_FILES['file']['name'];
                $targetPath = "./assets/images/" . $fileName;
            
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                
                echo "<img src='./assets/images/". $fileName ."' width='150' />";

                $users = [
                    'id'       => count($_SESSION['users']) + 1,
                    'fullname' => $fullname,
                    'file'     => $targetPath,
                    'phone'    => $phone,
                    'address'  => $address,
                    'gender'   => $gender,
                    'email'    => $email,
                    'password' => $password,
                ];

                $_SESSION['users'][] = $users;
                
                header('location:admin-management.php?module=user&action=list');
                return;

            }

        }

    }