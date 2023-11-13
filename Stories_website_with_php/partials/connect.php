<?php 

$con=new mysqli('localhost','root','','storeis');
if($con)
{
	// echo "connection successful";
}
else
{
	die(mysqli_error($con));
}


?>