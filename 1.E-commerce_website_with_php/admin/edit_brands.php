

<?php
   
   $edit_id=$_GET['edit_brands'];
    $select_query="SELECT * FROM brands WHERE brand_id=$edit_id ";
    $run_query = mysqli_query($con, $select_query);
    $row=mysqli_fetch_assoc($run_query);
    $brand_title=$row['brand_title'];

    if(isset($_POST['update_brand']))
    {  
    	$fech_title=$_POST['brand_title'];
    	$update_brand="UPDATE `brands` SET `brand_title`='$fech_title' WHERE brand_id=$edit_id";
    	$run_update_brand=mysqli_query($con,$update_brand);

    	if($run_update_brand)
    	{
    		echo "<script>alert('Brand updated successfully!!!✅✅✅')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    	}
    }

?>

<form method="POST" action="">
<div class="text-center my-3">
  <h1 class="fw-bold text-success">Edit Brand</h1>
</div>
<div class="input-group mb-3">
  <span class="input-group-text bg-warning" id="basic-addon1">

    <i class="fas fa-edit"></i> Edit

  </span>
  <input type="text" class="form-control" name="brand_title"  aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $brand_title ?>">
</div>
<div>
    <input type="submit"  name="update_brand" value="Update" class="btn btn-warning my-2">
</div>
</form>
