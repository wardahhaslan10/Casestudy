<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: [Your Registration Number]
Class              : DDT7B
*/

include 'db.php';

$username = "admin";
$password = "admin123";
$full_name = "Administrator";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, full_name)
        VALUES ('$username', '$hashed_password', '$full_name')";

if (mysqli_query($conn, $sql)) {

    echo "User created successfully.<br>";
    echo "Username: admin<br>";
    echo "Password: admin123";

} else {

    echo "Error: " . mysqli_error($conn);

}
?>