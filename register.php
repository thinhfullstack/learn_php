<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST && GET</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php 
        $fullname = $address = $phone = $email = $password = $gender = '';
        $fullnameErrMessage = 
        $addressErrMessage = 
        $phoneErrMessage = 
        $emailErrMessage =
        $passwordErrMessage =
        $genderErrMessage =
        '';
        $content = '';
        
        if(isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
        }

        if (isset($_POST['btnReset'])) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        
        if(empty($fullname)) {
            $fullnameErrMessage = 'Vui lòng nhập đầy đủ thông tin họ và tên';
        } else if(strlen($fullname) < 2) {
            $fullnameErrMessage = 'Họ và tên không được nhỏ hơn 2 ký tự';
        }
        
        if(empty($address)) {
            $addressErrMessage = 'Vui lòng nhập đầy đủ thông tin địa chỉ';
        }

        if(empty($phone)) {
            $phoneErrMessage = 'Vui lòng nhập đầy đủ thông tin số điện thoại';
        } else if(!is_numeric($phone)) {
            $phoneErrMessage = 'Số điện thoại nhập phải là số';
        } else if(strlen($phone) > 10 || strlen($phone) < 10) {
            $phoneErrMessage = 'Số điện thoại nhập không vượt quá hoặc nhỏ hơn 10 ký tự';
        } 

        if(empty($email)) {
            $emailErrMessage = 'Vui lòng nhập đầy đủ thông tin email';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErrMessage = 'Email nhập phải đúng định dạng';
        }

        if(empty($password)) {
            $passwordErrMessage = 'Vui lòng nhập đầy đủ thông tin mật khẩu';
        } else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).*$/', $password)) {
            $passwordErrMessage = 'Mật khẩu phải có cả chữ hoa và thường';
        } else if(strlen($password) < 8) {
            $passwordErrMessage = 'Mật khẩu không được nhỏ hơn 8 ký tự';
        }

        if(empty($gender)) {
            $genderErrMessage = 'Vui lòng chọn giới tính của bạn';
        } 

        if($fullname && $address && $phone && $email && $password && $gender) {
            $content .= "<p>Tên của bạn: ${fullname}";  
            $content .= "<p>Address của bạn: ${address}";
            $content .= "<p>Phone của bạn: ${phone}";
            $content .= "<p>Email của bạn: ${email}";
            $content .= "<p>Giới tính của bạn: ${gender}";
        }

    ?>
    <form action="" method="POST">
        <label for="fullname">FullName:</label>
        <input type="text" id="fullname" class="<?= $fullnameErrMessage ? 'input_error' : '' ?>" name="fullname" value="<?= $fullname ?>" placeholder="fullname....">
        <?= $fullnameErrMessage ? "<span class='error'>$fullnameErrMessage</span>" : '' ?>
        <br />
        <label for="address">Address:</label>
        <input type="text" id="address" class="<?= $addressErrMessage ? 'input_error' : '' ?>" name="address" value="<?= $address ?>" placeholder="address....">
        <?= $addressErrMessage ? "<span class='error'>$addressErrMessage</span>" : '' ?>
        <br />
        <label for="phone">Phone:</label>
        <input type="text" id="phone" class="<?= $phoneErrMessage ? 'input_error' : '' ?>" name="phone" value="<?= $phone ?>" placeholder="phone....">
        <?= $phoneErrMessage ? "<span class='error'>$phoneErrMessage</span>" : '' ?>
        <br />
        <label for="email">Email:</label>
        <input type="text" id="email" class="<?= $emailErrMessage ? 'input_error' : '' ?>" name="email" value="<?= $email ?>" placeholder="email....">
        <?= $emailErrMessage ? "<span class='error'>$emailErrMessage</span>" : '' ?>
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" class="<?= $passwordErrMessage ? 'input_error' : '' ?>" name="password" value="<?= $password ?>" placeholder="password....">
        <?= $passwordErrMessage ? "<span class='error'>$passwordErrMessage</span>" : '' ?>
        <br />
        <label for="gender">Gender:</label>
        <div id="gender">
            <input type="radio" id="male" name="gender" value="Nam" <?php $gender === 'Nam' ? 'checked' : '' ?>>Nam
            <input type="radio" id="famale" name="gender" value="Nữ" <?php $gender === 'Nữ' ? 'checked' : '' ?>>Nữ
            <?= $genderErrMessage ? "<span class='error'>$genderErrMessage</span>" : '' ?>
        </div>

        <button type="submit" name="submit">Register</button>
        <button name="btnReset" type="submit">Reset</button>
    </form>

    <div class='result'><?= $content ?></div>
</body>
</html>