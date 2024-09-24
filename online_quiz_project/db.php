<?php 


$host = 'localhost';
$dbname = 'google_form';
$username = 'root';  // replace with your MySQL username
$password = '';      // replace with your MySQL password

// Connect using MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>