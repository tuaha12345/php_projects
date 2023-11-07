<?php 

  if(isset($_GET['delete_orders']))
  { 
  	$order_id=$_GET['delete_orders'];
  	$delete="DELETE FROM `user_orders` WHERE order_id=$order_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php?list_orders','_self')</script>";
  	}

  }	