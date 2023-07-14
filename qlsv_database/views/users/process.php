<?php

$personal_id = $name = $email = $password = $birthday = $gender = $file = '';
$errPersonalId = $errFile = $errName = $errEmail = $errPassword = $errBirthday = $errGender = '';

if(isset($_POST['btn-save'])) {
    $personal_id = $_POST['personal_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthday = $_POST['birthday'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $file = isset($_POST['file']);

    if (isset($_POST['btn-reset'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if(!$personal_id) {
        $errPersonalId = 'Vui lòng nhập số căn cước công dân của người dùng';
    }

    if(!$name) {
        $errName = 'Vui lòng nhập họ và tên của người dùng';
    }

    if(!$email) {
        $errEmail = 'Vui lòng nhập email của người dùng';
    }

    if(!$password) {
        $errPassword = 'Vui lòng nhập mật khẩu của người dùng';
    }

    if(!$birthday) {
        $errBirthday = 'Vui lòng nhập năm sinh của người dùng';
    }

    if(!$gender) {
        $errGender = 'Vui lòng nhập giới tính của người dùng';
    }

    if($personal_id && $name && $email && $password && $birthday && $gender) {
        $user = new User;
        $user->create([
            'personal_id' => time(),
            'name'        => $name,
            'email'       => $email,
            'password'    => $password,
            'birthday'    => $birthday,
            'gender'      => $gender,
            'family_id'   => 1
        ]);

        header('location:index.php?module=user&action=list');
    }

}
