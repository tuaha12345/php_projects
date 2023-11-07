<?php 
include './includes/connect.php';
include './function/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CuteRobotics</title>
	<link rel="icon" type="image/x-icon" href="images/cute_robot_1.png">

	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-------- CSS ------>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.cart_img{
			height:70px;
			width:70px;
			object-fit:container;
		}
	</style>

</head>
<body>

     <!-- navbar--->
     <div class="container-fluid p-0">
     	<!--- first child -->
     	<nav class="navbar navbar-expand-lg bg-warning">
		  <div class="container-fluid">
		    <img src="images/cute_robot_1.png" class="logo_img">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active " aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="display_all.php">Products</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="user_area/user_registration.php">Regiser</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number(); ?></sup></a>
		        </li>

		      </ul>

		    </div>
		  </div>
		</nav>



        <!--- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        	<ul class="navbar-nav me-auto ">

        		<?php 

        		   if(!isset($_SESSION['username']))
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#d'>Welcome Guest!!!</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='user_area/user_login.php'>Login</a>
				        </li> ";
        		   }

        		   else
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#'>Welcome".$_SESSION['username']."</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='user_area/user_logout.php'>Logout</a>
				        </li> ";
        		   }

		        ?>

        	</ul>


        </nav>


    <!--- 3rd child -->

    <div class="bg-light">
    	<h3 class="text-center p-3">Hidden Store</h3>
    	<p class="text-center pb-3">Communications is at the heart of e-commerce and community</p>
    	
    </div>
   

    <!----- fourth child table-------->
    <div class="container">

	    <form method="post"> 
	    	<table class="table table-bordered text-center">


	                <?php  

			
					global $con;
					$get_id_address=getIPAddress();
					$total_price=0;
					$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_id_address'";
					$result=mysqli_query($con,$cart_query);
					$rows_count=mysqli_num_rows($result);
					if($rows_count>0)
					{ 	
                       echo " <thead>
			    			<th>Product Title</th>
			    			<th>Product Image</th>
			    			<th>Quantity</th>
			    			<th>Total Price</th>
			    			<th>Remove</th>
			    			<th>Operations</th>

			    		</thead>

			    		<tbody> ";

                     


						while($row=mysqli_fetch_array($result))
						{
							$product_id=$row['product_id'];
							 $quantities = $row['quantity'];
							$select_products="SELECT * FROM products WHERE product_id='$product_id'";
							$result_products=mysqli_query($con,$select_products);/// remember this $result_products varialbe must be unique if  you try to use mysqli_query() in the same //page again and again

							$row_product=mysqli_fetch_array($result_products);
							$product_title=$row_product['product_title'];
							$product_img=$row_product['product_image1'];
							$product_price=$row_product['product_price'];
							$product_total_price=array($row_product['product_price']);
							$product_price_sum=array_sum($product_total_price);
							$total_price+=$product_price_sum*$quantities;

							// echo "price=".$product_price;
							// echo ",ID=".$product_id;
							// echo ",QTy=".$quantities;
							// echo "<br>";
							
						
						 ?>
		                     
			
				    


		    			<tr>
		    				<td><?php echo $product_title; ?></td>
		    				<td><img src="./admin/product_images/<?php echo $product_img; ?>" alt="<?php echo $product_img; ?>" class="cart_img"></td>

		                    <td>
		                    	<!-- Change the name attribute for the quantity input fields to use an array -->
							<input type="text" name="qty[<?php echo $product_id; ?>]" class="form-input w-50 text-center" value="<?php echo $quantities ?>">
							<input type="hidden" name="get_id[]" value="<?php echo $product_id ?>">

		                    </td>


		    				<?php   


		    				?>

		    				<td><?php echo $product_price*$quantities; ?></td>
		    				<td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
		    				<td class="">

		    					<input type="submit" name="update_cart" class="btn btn-warning me-2 text-bold" value="Update">
		    					
		    					<input type="submit" name="remove" class="btn btn-danger ms-2 text-bold" value="Remove">
		    				</td>
		    			</tr>

	    			<?php 
	                    } ///////// for the end of while loop 
                    
                    } /// end of if 

                    else{

                    	echo " <div class='container-fluid'>
                    		      <div class='alert alert-danger text-center'>
									<h3 class='text-danger'>Cart is empty!<h3>
								</div>
                    </div>";
                    }
	    			?>

	    		</tbody>
	    	</table>
	    
	    </form>	




    	<!---------------- subtotoal--------------->
    	<?php 
    				// 		global $con;
					// $get_id_address=getIPAddress();
					// $total_price=0;
					// $cart_query="SELECT * FROM cart_details WHERE ip_address='$get_id_address'";
					// $result=mysqli_query($con,$cart_query);
					// $rows_count=mysqli_num_rows($result);

             if($rows_count>0)
             {
               echo " <div class='d-flex m-5'>
					      <h4>Subtotal:<strong class='text-warning'>" . $total_price . "/-</strong></h4>
					      <a href='index.php' class='btn btn-warning mx-3'>Continue Shopping</a>
					      <a href='user_area/checkout.php' class='btn btn-secondary'>Checkout</a>

		    	      </div> ";
             }

             else{
                echo " <div class='text-center m-5'><a href='index.php' class='btn btn-warning mx-3 text-bold'>Continue Shopping</a></div>";
             }


    	?>






    </div>













 <!-------------- function to remove item--------->
<?php  

function remove_cart_item()
{
	global $con;
	if(isset($_POST['remove']))
	{
		// Check if any checkboxes are selected
		if(isset($_POST['removeitem']) )
		{
			foreach ($_POST['removeitem'] as $remove_id) {
				//echo $remove_id;
				$delete_query="DELETE FROM cart_details WHERE product_id=$remove_id ";
				$run_delete=mysqli_query($con,$delete_query);

				if($run_delete)
				{
					echo "<script>window.open('cart.php','_self')</script>";
				}
			}
		}
		else
		{
			// No checkboxes selected, display a message
			echo "Please select the checkbox.";
		}
	}
}

   // call remove_cart_item funcation 
   remove_cart_item();

///////////////////////////---------------- update cart quantity--



	    $get_id_add = getIPAddress();
		// In your PHP code, when updating the cart:
		if (isset($_POST['update_cart'])) {
			    $quantities = $_POST['qty'];

			    foreach ($_POST['get_id'] as $update_id) {
			        // Get the quantity for the specific product
			        $quantity = $quantities[$update_id];

			        // Update the quantity for the specific product
			        $update_cart = "UPDATE cart_details SET quantity='$quantity' WHERE product_id=$update_id ";
			        $re = mysqli_query($con, $update_cart);

			        // Calculate the total price for this product
			        // $product_total_price = $product_price * (int)$quantity;
			        // $total_price += $product_total_price;

			        
			    }
			    
			    // Redirect to the cart page or do any other necessary actions
			    if ($re) {
			        echo "<script>window.open('cart.php','_self')</script>";
			    }
		}





//////////////////////////////////////					
?>



		<!----- last child-footer --->
           <?php
               include "./includes/footer.php";
           ?>


     </div>





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
