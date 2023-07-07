<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("Dog.php");
require("Cat.php");

$dog = new Dog("Buddy");
echo $dog->getName() . " " . $dog->makeSound();

echo "<br>";

$cat = new Cat("Kitten");
echo $cat->getName() . " " . $cat->makeSound();

