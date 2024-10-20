<?php
// db.php
$servername = "localhost";  // Change as necessary
$username = "root";         // Your DB username
$password = "";             // Your DB password
$dbname = "smart_waste_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
