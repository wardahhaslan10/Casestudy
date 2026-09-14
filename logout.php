<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : __wardha binti haslan____________________________
Registration Number: _18ddt23f1099_____________________________
Class              : _______ddt7b_______________________
*/

session_start();

$_SESSION = [];

session_destroy();

header("Location: index.php");
exit;
?>