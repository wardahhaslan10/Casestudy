<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : __WARDAH BINTI HASLAN____________________________
Registration Number: ______18DDT23F1099________________________
Class              : _______DDT7B_______________________
*/

$host = "localhost";
$user = "root";
$pass = "";
$db   = "e_document_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>