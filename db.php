<?php 

$servername = "localhost";
$username = "root";
$password = "159753852cafarc";
$dbname = "prospect_erp";
//db connection

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




 ?>