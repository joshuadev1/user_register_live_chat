<?php 

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";
//db connection

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




 ?>
