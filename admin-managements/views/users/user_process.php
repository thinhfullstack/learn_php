<?php
    $fullname = $email = $pwd = $phone = $address = $gender = $file = '';
    $errFullName = $errEmail = $errPWD = $errPhone = $errAddress = $errGender = $errFile = '';

    if(isset($_POST['btn-save'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pwd = $_POST['$pwd'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $file = $_POST['file'];

        if (isset($_POST['btn-reset'])) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if(!$fullname) {
            $errFullName = 'Vui lòng nhập tên tài khoản để đăng ký đầy đủ';
        }

        if(!$email) {
            $errEmail = 'Vui lòng nhập email để đăng ký tài khoản';
        }

        if(!$pwd) {
            $errPWD = 'Vui lòng nhập mật khẩu để đăng ký tài khoản';
        }

        if(!$phone) {
            $errPhone = 'Vui lòng nhập số điện thoại để đăng ký tài khoản';
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

        if($fullname && $email && $password && $phone && $address && $gender && $file) {
            $_SESSION['user'] = [
                'fullname' => $fullname,
                'email'    => $email,
                'pwd'      => $pwd,
                'phone'    => $phone,
                'address'  => $address,
                'gender'   => $gender,
                'file'     => $file,
            ];

            header('location:admin-management.php?module=user&action=list');
            return;
        }

    }