<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : ______________________________
Registration Number: ______________________________
Class              : ______________________________
*/

session_start();

$_SESSION = [];

session_destroy();

header("Location: index.php");
exit;
?>