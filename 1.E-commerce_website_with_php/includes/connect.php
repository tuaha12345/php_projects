<?php

$con=mysqli_connect('localhost','root','','ecommerce_php');
if($con)
{
	// echo "connection successful";

}
else{
	die(mysqli_error($con));
}






?>