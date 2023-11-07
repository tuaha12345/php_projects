<?php 
  include "../includes/connect.php";
  if(isset($_POST['insert']))
  {
    $categories_title = $_POST['cat_title'];
    //select data from database
    $select_query="SELECT * FROM categories WHERE category_title='$categories_title'";
    $result_select = mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0)
    {
      echo "<script>alert('This Category already has been inserted 🚫.')</script>";
    }
    else
    {
          $insert_query = "INSERT INTO categories (category_title) values ('$categories_title')";
    $result = mysqli_query($con, $insert_query);
    if($result)
    {
      // echo "<script>alert('Category has been inserted successfully✔️')</script>";
      //or
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Category has been inserted successfully✔️
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      
    }
    }
  }
?>
<form method="POST" action="">
<div class="text-center my-3">
  <h1 class="fw-bold text-warning">Insert Categories</h1>
</div>
<div class="input-group mb-3">
  <span class="input-group-text bg-warning" id="basic-addon1">
    <i class="fa-solid fa-receipt"></i>
  </span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" required>
</div>
<div>
    <input type="submit"  name="insert" value="Insert" class="btn btn-warning my-2" >
</div>
</form>
