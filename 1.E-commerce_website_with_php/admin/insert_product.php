<?php 
  include "../includes/connect.php";
  if(isset($_POST['submit']))
  {
  	$product_title=$_POST['product_title'];
  	$product_description=htmlspecialchars($_POST['product_description']);
  	//$product_details=$_POST['product_details'];
  	$product_details = mysqli_real_escape_string($con, $_POST['product_details']);
  	$product_keywords=$_POST['product_keywords'];
  	$product_category=$_POST['product_category'];
  	$product_brands=$_POST['product_brand'];
  	$product_price=$_POST['price'];
  	$product_status='true';
  	$currentDateTime = date('Y-m-d h:i:s A');


  	// accesing images
  	$product_img1=$_FILES['img1']['name'];
  	$product_img2=$_FILES['img2']['name'];
  	$product_img3=$_FILES['img3']['name'];

    //tmp location
    $tmp_loc1= $_FILES['img1']['tmp_name'];
    $tmp_loc2= $_FILES['img2']['tmp_name'];
    $tmp_loc3= $_FILES['img3']['tmp_name'];

    //file type
    $file1_type=$_FILES['img1']['type'];
    $file2_type=$_FILES['img2']['type'];
    $file3_type=$_FILES['img3']['type'];

    //upload location
    $img1_up_loc="product_images/".$product_img1;
    $img2_up_loc="product_images/".$product_img2;
    $img3_up_loc="product_images/".$product_img3;

  	if($file1_type=='image/jpeg' or $file1_type=='image/png')
  	{
  		$move=move_uploaded_file($tmp_loc1, $img1_up_loc);
  	}
  	 if($file2_type=='image/jpeg' or $file2_type=='image/png')
  	{
  		$move=move_uploaded_file($tmp_loc2, $img2_up_loc);
  	}
  	 if($file3_type=='image/jpeg' or $file3_type=='image/png')
  	{
  		$move=move_uploaded_file($tmp_loc3, $img3_up_loc);
  	}

  	else{
  		echo "Flie format not matching";
  	}

$insert_products = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status,product_details) VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brands', '$product_img1', '$product_img2', '$product_img3', '$product_price', NOW(), '$product_status','$product_details')";

    	$result_query=mysqli_query($con,$insert_products);
    	if($result_query)
    	{          
    		    header("Location: insert_product.php");
            exit();
        
    	}

  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Products-Admin Dashboard</title>
	<link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">
	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-------- CSS ------>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="bg-light">

	<div class="container mt-3"> 
        <h1 class="text-center fw-bold text-warning">Insert Products</h1>
        <!---form---->
        <form action="" method="POST" enctype="multipart/form-data">
        	<!---- title----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_title" class="form-label">Product title</label>
        		<input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required='required'>
        	</div>
        	<!---- description----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_title" class="form-label">Product Short Description</label>
        		<input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required='required' maxlength="150">
        	</div>
        	<!---- Product details ----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_title" class="form-label">Product Details</label>
            <textarea class="form-control" aria-label="With textarea" name="product_details"></textarea>
        	</div>        	
        	 <!---- keywords----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="product_keywords" class="form-label">Product keyword</label>
        		<input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required='required'>
        	</div>
        	<!------ categories--->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<select name="product_category" class="form-select">
        			<option value="">Select a Category</option>
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
        	<!------ brands--->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<select name="product_brand" class="form-select">
        			<option value="">Select a brand</option>
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
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="img1" class="form-label">Product Image1</label>
        		<input type="file" name="img1" id="img1" class="form-control" required='required'>
        	</div>
        	 <!---- image2----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="img2" class="form-label">Product Image2</label>
        		<input type="file" name="img2" id="img3" class="form-control" required='required'>
        	</div>
            <!---- image3----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="img3" class="form-label">Product Image3</label>
        		<input type="file" name="img3" id="img1" class="form-control" required='required'>
        	</div>
            <!---- price----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		<label for="price" class="form-label">Product price</label>
        		<input type="text" name="price" id="price" class="form-control" placeholder="Enter product price" autocomplete="off" required='required'>
        	</div>
        	 <!---- submit----->
        	<div class="form-outline mb-4 w-50 m-auto">
        		
        		<input type="submit" name="submit"  class=" btn btn-warning text-light" value="Insert Products" >
        	</div>

        </form>
	</div>

</body>
</html>