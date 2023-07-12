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

    // if(!$file) {
    //     $errFile = 'Vui lòng chọn ảnh đại diện của người dùng';
    // }

    if($personal_id && $name && $email && $password && $birthday && $gender) {
        // $sqlInsertUser = "INSERT INTO users (personal_id, name, email, birthday, gender) 
        //         VALUES(:personal_id, :name, :email, :birthday, :gender)";
    }

}
