<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_project";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn)
{
	//echo "connectoin successfull";
}
else{
	die(mysqli_error($conn));
}





 ?>