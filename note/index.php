<?php

require("Mail.php");
require("User.php");
require("Person.php");
require("Employee.php");

$employee = new Employee();
$employee->uploadAvata();
echo "<br/>";
$employee->changePassword();
echo "<br/>";
$employee->sendMail();