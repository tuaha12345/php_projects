<?php 

  if(isset($_GET['delete_categories']))
  { 
  	$delete_id=$_GET['delete_categories'];
  	$delete="DELETE FROM `categories` WHERE category_id=$delete_id ";
  	$delete_query=mysqli_query($con,$delete);
  	if($delete_query)
  	{
  	 echo "<script>alert('Data deleted successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php?view_category','_self')</script>";
  	}

  }	