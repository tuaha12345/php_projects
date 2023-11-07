<?php 
include './includes/connect.php';
include './function/common_function.php';
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
		          <a class="nav-link " href="#">Regiser</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Total Price: </a>
		        </li>


		      </ul>
		      <form class="d-flex"  method="get" action="index.php" role="search">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
		        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
		      </form>
		    </div>
		  </div>
		</nav>

<!---------- calling cart funcation---->
<?php
cart();
?>

        <!--- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        	<ul class="navbar-nav me-auto ">

        		<li class="nav-item mx-2">
		          <a class="nav-link " href="#">Welcome Guest!!!</a>
		        </li>

		        <li class="nav-item mx-2">
		          <a class="nav-link " href="user_area/user_login.php">Login</a>
		        </li>

        	</ul>


        </nav>

    <!--- 3rd child -->

    <div class="bg-light">
    	<h3 class="text-center p-3">Hidden Store</h3>
    	<p class="text-center pb-3">Communications is at the heart of e-commerce and community</p>
    	
    </div>

    <!--- 4th child -->
    <div class="row">
    	<div class="col-md-10">
    		<!--product-->
    		<div class="row ms-2">

             



               <?php 
                
               view_details();
             
               search_products();
               get_unique_categories();
               get_unique_brands();
               ?>






    		</div>
    	</div>

        <!------sidenav------>
    	<div class="col-md-2 bg-secondary p-0">
    		<!---- Brands will be displayed--->
         <ul class="navbar-nav me-auto text-center">
         	<li class="nav-item bg-warning">
         		<a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
         	</li>
           
         	<?php 
            brands();
            
         	?>

         </ul>

         <!---- Category will be displayed--->
        <ul class="navbar-nav me-auto text-center">
         	<li class="nav-item bg-warning">
         		<a href="#" class="nav-link text-light"><h4>Category Brands</h4></a>
         	</li>
         	         	<?php 
                     categories();

		         	?>
         	         	         	      	
         </ul>
    	</div>
    </div>








		<!----- last child-footer --->
           <?php
               include "./includes/footer.php";
           ?>


     </div>





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

