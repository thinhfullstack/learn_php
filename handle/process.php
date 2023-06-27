<?php 
    $fullname = $phone = $address = '';
    $fullnameErr = $phoneErr = $addressErr = '';
    $content = '';

    if(isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $originalFullname = $fullname;
        $capitalizedFullname = ucwords($fullname);

        if(empty($fullname)) {
            $fullnameErr = 'Vui lòng nhập đầy đủ thông tin họ và tên';
        } else if($capitalizedFullname !== $originalFullname) {
            $fullnameErr = 'Các chữ cái đầu họ và tên phải viết hoa';
        } else if(is_numeric($fullname)) {
            $fullnameErr = 'Vui lòng nhập chữ, không được để là số';
        } else if (strlen($fullname) < 2) {
            $fullnameErr = 'Tên không được nhỏ hơn 2 ký tự';
        }

        if(empty($phone)) {
            $phoneErr = 'Vui lòng nhập số điện thoại của bạn';
        } else if(!is_numeric($phone)) {
            $phoneErr = 'Số điện thoại nhập phải là số';
        } else if(strlen($phone) > 10 || strlen($phone) < 10) {
            $phoneErr = 'Số điện thoại nhập phải đủ 10 số';
        }

        if(empty($address)) {
            $addressErr = 'Vui lòng nhập địa chỉ nhận hàng';
        } 
    }

    if (isset($_POST['btn-cancel'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if(strlen($fullname) >= 2 && $phone && $address && strlen($phone) === 10) {
        $content .= '<div class="">Tên của bạn: ' . "<font color='#cd3bb7'> $fullname </font>" . '</div>';
        $content .= '<div class="">Số điện thoại của bạn : ' . "<font color='green'> $phone </font>" . '</div>';
        $content .= '<div class="">Địa chỉ bạn muốn gửi đi: ' . "<font color='#f90162'> $address </font>" . '</div>';
    }

?>