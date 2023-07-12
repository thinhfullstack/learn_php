<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("./Model.php");
require("./User.php");

$userModel = new User();
$userModel->query("SELECT * FROM users");
$users = $userModel->getAll();

$sqlInsert = "INSERT INTO users() VALUES()";

// Create a new Users
$userModel->create([
    'personal_id' => '435345435',
    'name' => 'Nguyen Van A',
    'email' => 'aaaaa@gmail.com',
    'password' => '123@123a',
    'gender' => 1,
    'avatar' => '',
    'birthday' => '1998-05-20 00:00:00',
    'family_id' => 1,
]);

$userModel->update(['name' => 'Nguyen Van B'], 3);

require_once("./views/users/index.php");