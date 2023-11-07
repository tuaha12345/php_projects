<?php 

  if(isset($_GET['edit_products']))
  { 
  	$edit_id=$_GET['edit_products'];
  	// echo $edit_id;
  	$get_data="SELECT * FROM products WHERE product_id=$edit_id";

   	$result = mysqli_query($con, $get_data);

    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_img1 = $row['product_image1'];
    $product_img2 = $row['product_image2'];
    $product_img3 = $row['product_image3'];
    $product_price = $row['product_price'];






//   	$product_description=$_POST['product_description'];
//   	//$product_details=$_POST['product_details'];
//   	$product_details = mysqli_real_escape_string($con, $_POST['product_details']);
//   	$product_keywords=$_POST['product_keywords'];
//   	$product_category=$_POST['product_category'];
//   	$product_brands=$_POST['product_brand'];
//   	$product_price=$_POST['price'];
//   	$product_status='true';
//   	$currentDateTime = date('Y-m-d h:i:s A');


//   	// accesing images
//   	$product_img1=$_FILES['img1']['name'];
//   	$product_img2=$_FILES['img2']['name'];
//   	$product_img3=$_FILES['img3']['name'];

//     //tmp location
//     $tmp_loc1= $_FILES['img1']['tmp_name'];
//     $tmp_loc2= $_FILES['img2']['tmp_name'];
//     $tmp_loc3= $_FILES['img3']['tmp_name'];

//     //file type
//     $file1_type=$_FILES['img1']['type'];
//     $file2_type=$_FILES['img2']['type'];
//     $file3_type=$_FILES['img3']['type'];

//     //upload location
//     $img1_up_loc="product_images/".$product_img1;
//     $img2_up_loc="product_images/".$product_img2;
//     $img3_up_loc="product_images/".$product_img3;

//   	if($file1_type=='image/jpeg' or $file1_type=='image/png')
//   	{
//   		$move=move_uploaded_file($tmp_loc1, $img1_up_loc);
//   	}
//   	 if($file2_type=='image/jpeg' or $file2_type=='image/png')
//   	{
//   		$move=move_uploaded_file($tmp_loc2, $img2_up_loc);
//   	}
//   	 if($file3_type=='image/jpeg' or $file3_type=='image/png')
//   	{
//   		$move=move_uploaded_file($tmp_loc3, $img3_up_loc);
//   	}

//   	else{
//   		echo "Flie format not matching";
//   	}

// $insert_products = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status,product_details) VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brands', '$product_img1', '$product_img2', '$product_img3', '$product_price', NOW(), '$product_status','$product_details')";

//     	$result_query=mysqli_query($con,$insert_products);
//     	if($result_query)
//     	{          
//     		    header("Location: insert_product.php");
//             exit();
        
//     	}

   }

 ?>

<body class="bg-light">

	<div class="container mt-3"> 
        <h1 class="text-center fw-bold text-warning">Edit Products</h1>
        <!---form---->
        <form action="" method="POST" enctype="multipart/form-data">
        	<!---- title----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_title" class="form-label">Product title</label>
        		<input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title ?>" autocomplete="off" required='required'>
        	</div>
        	<!---- description ----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_title" class="form-label">Product Description</label>
        		<input type="text" name="product_description" id="product_title" class="form-control" value="<?php echo $product_description ?>" autocomplete="off" required='required'>
        	</div>       	
        	 <!---- keywords----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_keywords" class="form-label">Product keyword</label>
        		<input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords ?>" autocomplete="off" required='required'>
        	</div>


        	<!------ ------categories-------------------->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<?php 
        		$select_categories="SELECT * FROM categories WHERE category_id=$category_id";
        		$run_category=mysqli_query($con,$select_categories);
        		$row_data=mysqli_fetch_assoc($run_category);
        		$categories_title=$row_data['category_title'];
        		$categories_id=$row_data['category_id'];

        		?>
        		<label  class="form-label">Product Categories</label>
        		<select name="product_category" class="form-select">
        			<option value="<?php echo $categories_id ?>"><?php echo $categories_title ?></option>
        			<?php 

        			$select_categories="SELECT * FROM categories";
		         	$result_categories=mysqli_query($con,$select_categories);
		            while ($row_data=mysqli_fetch_assoc($result_categories)) {
		                 $title=$row_data['category_title'];
		                 $id=$row_data['category_id'];

		                 echo "<option value='$id'>$title</option>";
                   
                   }
        			?>

        		</select>
        	</div>


        	<!-----------------brands------------------->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<?php 
        		$select_brands="SELECT * FROM brands WHERE brand_id=$brand_id";
        		$run_brands=mysqli_query($con,$select_brands);
        		$row_data=mysqli_fetch_assoc($run_brands);
        		$brand_title=$row_data['brand_title'];
        		$brand_id=$row_data['brand_id'];
        		?>
        		<label  class="form-label">Product Brands</label>
        		<select name="product_brand" class="form-select">
        			<option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
        			<?php 

        			$select_brands="SELECT * FROM brands";
		         	$result_brands=mysqli_query($con,$select_brands);
		            while ($row_data=mysqli_fetch_assoc($result_brands)) {
		                 $title=$row_data['brand_title'];
		                 $id=$row_data['brand_id'];

		                 echo "<option value='$id'>$title</option>";
                   
                   }
        			?>

        		</select>
        	</div>
        	 <!---- image1----->
        	<div class="form-outline mb-4 w-50 m-auto ">
        		
        		<label for="img1" class="form-label">Product Image1</label>
        		<div class="d-flex m-auto">
        		<input type="file" name="img1" id="img1" class="form-control" >
        		<img src="./product_images/<?php echo $product_img1 ?>" alt=<?php echo $product_img1 ?> class="<?php echo $product_img1 ?>" required>
        	  </div>
        	</div>
        	 <!---- image2----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="img2" class="form-label">Product Image2</label>
        		<div class="d-flex m-auto">
        		<input type="file" name="img2" id="img2" class="form-control" >
        		<img src="./product_images/<?php echo $product_img2 ?>" alt=<?php echo $product_img2 ?> class="<?php echo $product_img2 ?>" required>
        	  </div>
        	</div>
            <!---- image3----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="img3" class="form-label">Product Image3</label>
        		<div class="d-flex m-auto">
        		<input type="file" name="img3" id="img3" class="form-control">
        		<img src="./product_images/<?php echo $product_img3 ?>" alt=<?php echo $product_img3 ?> class="<?php echo $product_img3 ?>" required>
        	  </div>
        	</div>
            <!---- price----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="price" class="form-label">Product price</label>
        		<input type="text" name="price" id="price" class="form-control" value="<?php echo $product_price ?>" autocomplete="off" >
        	</div>
        	 <!---- submit----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		
        		<input type="submit" name="update"  class=" btn btn-warning text-light" value="Update product" >
        	</div>

        </form>
	</div>

</body>
</html>

<?php
if(isset($_POST['update']))
{
	$product_title=$_POST['product_title'];
	$product_description=$_POST['product_description'];
	$product_keywords=$_POST['product_keywords'];
	$product_category=$_POST['product_category'];
	$product_brand=$_POST['product_brand'];

  $product_image1=$_FILES['img1']['name'];
	$tmp_loc_img1=$_FILES['img1']['tmp_name'];

	$product_image2=$_FILES['img2']['name'];
	$tmp_loc_img2=$_FILES['img2']['tmp_name'];

	$product_image3=$_FILES['img3']['name'];
	$tmp_loc_img3=$_FILES['img3']['tmp_name'];
	$uploc='product_images/';

	$product_price=$_POST['price'];

   // move_uploaded_file
	move_uploaded_file($tmp_loc_img1,$uploc.$product_image1);
	move_uploaded_file($tmp_loc_img2,$uploc.$product_image2);
	move_uploaded_file($tmp_loc_img3,$uploc.$product_image3);
	
  
  // query to update products
  $update_product="UPDATE `products` SET `product_title`='$product_title',`product_description`='$product_description',`product_keywords`='$product_keywords',`category_id`='$product_category',`brand_id`='$product_brand',`product_image1`='$product_image1',`product_image2`='$product_image2',`product_image3`='$product_image3',`product_price`='$product_price',`date`=NOW() WHERE  `product_id`=$edit_id";

  $result_update=mysqli_query($con,$update_product);
  if($result_update)
  {
  	echo "<script>alert('Data updated successfully!!!✅✅✅')</script>";
  	 echo "<script>window.open('./index.php','_self')</script>";
  }

}


?>	