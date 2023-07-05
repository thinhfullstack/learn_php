<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <style>
        .flex-gender {
            display: flex;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php 
        require("Student.php");
        
        $student = new Student;
        $student->processSubmit();

        $errFullName = Student::getMessageError('fullname');
        $errEmail = Student::getMessageError('email');
        $errPhone = Student::getMessageError('phone');
        $errGender = Student::getMessageError('gender');
    ?>
    <form action="" method="POST">
    <div>
        <label for="fullname">Họ và tên:</label>
        <input type="text" name="fullname" value="<?= $student->getFullName() ?>" placeholder="Nhập họ và tên">
        <?php if($errFullName): ?>
            <p class="error"><?= $errFullName ?></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $student->getEmail() ?>" placeholder="Nhập email">
        <?php if($errEmail): ?>
            <p class="error"><?= $errEmail ?></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="phone">Điện thoại:</label>
        <input type="text" name="phone" value="<?= $student->getPhone() ?>" placeholder="Nhập số điện thoại">
        <?php if($errPhone): ?>
            <p class="error"><?= $errPhone ?></p>
        <?php endif; ?>
    </div>
    <div class="flex-gender">
        <label for="fullname">Giới tính:</label>
        <div>
            <label for="male">Nam</label>
            <input type="radio" id="male" name="gender" value="1" <?= $student->getGender() == 1 ? 'checked' : '' ?>>
        </div>
        <div>
            <label for="famale">Nữ</label>
            <input type="radio" id="famale" name="gender" value="2" <?= $student->getGender() == 2 ? 'checked' : '' ?>>
        </div>
        <?php if($errGender): ?>
            <p class="error"><?= $errGender ?></p>
        <?php endif; ?>
    </div>
    <button name="btn-save">Lưu lại</button>
    <button name="btn-reset">Huỷ</button>
</form>

<h2>Danh sách hiển thị:</h2>
<p>Họ và tên: <?= $student->getFullName() ?></p>
<p>Email của bạn: <?= $student->getEmail() ?></p>
<p>Số điện thoại của bạn: <?= $student->getPhone() ?></p>
<p>Giới tính của bạn: <?= $student->getGender() == 1 ? 'Nam' : ($student->getGender() == 2 ? 'Nữ' : '') ?></p>
    
</body>
</html>