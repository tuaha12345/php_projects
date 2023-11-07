<?php 

  if(isset($_GET['delete_payment']))
  { 
  	$payment_id=$_GET['delete_payment'];
  	$delete="DELETE FROM `user_payments` WHERE payment_id=$payment_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php?All_payments','_self')</script>";
  	}

  }	