<!--
 **** MySQL Database Create Code ****

-- Create the database first
CREATE DATABASE php_crud;

-- Use the newly created database
USE php_crud;

-- Create the student table
CREATE TABLE `student` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `dob` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-->




<?php
$username = "root";
$password = "1234.@Ab"; //type your mysql server password here
$server = 'localhost';
$dbname = 'php_crud';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>