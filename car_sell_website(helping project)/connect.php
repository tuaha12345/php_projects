<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_sell_website";

$con=mysqli_connect($servername,$username,$password,$dbname);
if($con)
{
	 //echo "connection successful";

}
else{
	die(mysqli_error($con));
}






?>