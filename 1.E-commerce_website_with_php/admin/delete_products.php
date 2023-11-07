<?php 

  if(isset($_GET['delete_products']))
  { 
  	$delete_id=$_GET['delete_products'];
  	$delete="DELETE FROM products WHERE product_id=$delete_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php','_self')</script>";
  	}

  }	