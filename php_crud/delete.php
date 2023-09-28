<?php 
include 'connection.php';
if(isset($_GET['Delete_id']))
{
	$get_id=$_GET['Delete_id'];
	$sql = "DELETE FROM crud WHERE id=$get_id";
	$res = mysqli_query($conn, $sql);
	if($res)
	{
     
     header("Location: display.php");
		
	}

	else
	{
		 die(mysqli_error($conn));
	}
}



?>