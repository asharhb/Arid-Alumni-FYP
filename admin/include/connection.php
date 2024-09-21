<?php
//Database configuration
$host = 'localhost';
$dbname = 'aridalumni';
$username = 'root';
$password = '';
$conn =  mysqli_connect($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

