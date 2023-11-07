<?php 

  if(isset($_GET['delete_brands']))
  { 
  	$delete_id=$_GET['delete_brands'];
  	$delete="DELETE FROM brands WHERE brand_id=$delete_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php?view_brand','_self')</script>";
  	}

  }	
