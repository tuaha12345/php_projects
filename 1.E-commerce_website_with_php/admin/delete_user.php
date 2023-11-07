<?php 

  if(isset($_GET['delete_user']))
  { 
  	$user_id=$_GET['delete_user'];
  	$delete="DELETE FROM `user_table` WHERE user_id=$user_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php?list_user','_self')</script>";
  	}

  }	