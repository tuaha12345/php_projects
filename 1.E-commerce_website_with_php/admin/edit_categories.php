

<?php
   
   $edit_id=$_GET['edit_categories'];
    $select_query="SELECT * FROM categories WHERE category_id=$edit_id ";
    $run_query = mysqli_query($con, $select_query);
    $row=mysqli_fetch_assoc($run_query);
    $category_title=$row['category_title'];

    if(isset($_POST['update_category']))
    {  
    	$fech_title=$_POST['cat_title'];
    	$update_category="UPDATE `categories` SET `category_title`='$fech_title' WHERE category_id=$edit_id";
    	$run_update_category=mysqli_query($con,$update_category);

    	if($run_update_category)
    	{
    		echo "<script>alert('Category updated successfully!!!✅✅✅')</script>";
  	        echo "<script>window.open('index.php?view_category','_self')</script>";
    	}
    }

?>

<form method="POST" action="">
<div class="text-center my-3">
  <h1 class="fw-bold text-success">Edit Categories</h1>
</div>
<div class="input-group mb-3">
  <span class="input-group-text bg-warning" id="basic-addon1">

    <i class="fas fa-edit"></i> Edit

  </span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $category_title ?>">
</div>
<div>
    <input type="submit"  name="update_category" value="Update" class="btn btn-warning my-2">
</div>
</form>
