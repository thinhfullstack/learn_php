<?php 

    require("./Model.php");
    require("./User.php");

    $userObject = new User;

    // Lấy ra tất cả danh sách users
    $userObject->query('SELECT * FROM users');
    $users = $userObject->getAll();

    // Thêm dữ liệu từ form vào trong database
    $sqlInsertUser = "INSERT INTO users (personal_id,name,email,password,avatar,gender,birthday,family_id) 
        VALUES('1231231231', 'Trần Văn Thịnh', 'tranvanthinh@gmail.com', '1231231231', '', 2, '2000-12-20 00:00:00', 1)";
    // $userObject->query($sqlInsertUser);

    // Delete
    $userObject->query('DELETE FROM users WHERE id = 8');

    