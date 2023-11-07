<?php 
include '../includes/connect.php';
include '../function/common_function.php';
session_start();
?> <!-------php1--->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../style.css">

    <style type="text/css">
        body{
            overflow-x:hidden;
        }
        .admin_img {
            width: 100px;
            object-fit: contain;
        }
        

        .bgcolor {
            background: #bdbdbb;
        }

    </style>
</head>
<body>

<!----------------------- condition ------------------->

  <?php 

    if(!isset($_SESSION['admin_name']))
        {
         include "./admin_login.php";
        }

       else
          {

             $admin_name=$_SESSION['admin_name'];

     ?> <!-------php2--->

         


<!--------------------------- end of condtion ----------->   





    <div class="container-fluid p-0">


        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-warning navbar-light">
            <div class="container-fluid d-flex align-items-center">
                <img src="../images/cute_robot_1.png" class="logo_img">
                
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><h4>Welcome <?php echo $admin_name ?>!!!</h4></a>
                    </li>
                </ul>
            </div>
        </nav>
     

        <!-- Second Child -->
        <div class="bgcolor">
            <div class="text-center p-5">
                <h1 class="fw-bold">Manage Details</h1>
            </div>

            <div class="row">
                <div class="col-md-12 p-5 d-flex">
                    <div>
                        <a href="">
                            <img src="../images/cute_robot_1.png" class="admin_img">
                        </a>
                        <p class="text-center fw-bold"><?php echo $admin_name ?></p>
                    </div>
                    <!----------->


				<div class="button text-center p-3 ms-3">
				    <div class="row">
				        <div class="col-lg col-md mb-2">
				            <a href="insert_product.php" class="bg-warning btn btn-lg text-light">Insert Products</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?view_products" class="bg-warning btn btn-lg text-light">View Products</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?insert_category" class="bg-warning btn btn-lg text-light">Insert Categories</a>
				        </div>
                        <div class="col-lg col-md mb-2">
                            <a href="index.php?view_category" class="bg-warning btn btn-lg text-light">View Categories</a>
                        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?insert_brands" class="bg-warning btn btn-lg text-light">Insert Brands</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?view_brand" class="bg-warning btn btn-lg text-light">View Brands</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?list_orders" class="bg-warning btn btn-lg text-light">All Orders</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?All_payments" class="bg-warning btn btn-lg text-light">All Payments</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="index.php?list_user" class="bg-warning btn btn-lg text-light">List Users</a>
				        </div>
				        <div class="col-lg col-md mb-2">
				            <a href="admin_logout.php" class="bg-danger btn btn-lg text-light">Logout</a>
				        </div>
				    </div>
				</div>


                    <!-------->
                </div>
            </div>
        </div>

       <?php

          }

        ?><!-------php3--->  



        <!-- Third Child -->
        <div class="container my-2">
            <?php 
                if(isset($_GET['insert_category']))
                {
                    include('insert_categories.php');
                }

                if(isset($_GET['insert_brands']))
                {
                    include('insert_brands.php');
                }

                if(isset($_GET['view_products']))
                {
                    include('view_products.php');
                }
                
                if(isset($_GET['edit_products']))
                {
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products']))
                {
                    include('delete_products.php');
                }
                
                if(isset($_GET['view_category']))
                {
                    include('view_categories.php');
                }
                if(isset($_GET['view_brand']))
                {
                    include('view_brands.php');
                }



                if(isset($_GET['edit_categories']))
                {
                     include('edit_categories.php');
                }
                if(isset($_GET['delete_categories']))
                {
                     include('delete_categories.php');
                }

                if(isset($_GET['edit_brands']))
                {
                     include('edit_brands.php');
                }
                if(isset($_GET['delete_brands']))
                {
                     include('delete_brands.php');
                }

                if(isset($_GET['list_orders']))
                {
                     include('list_orders.php');
                }
                if(isset($_GET['delete_orders']))
                {
                     include('delete_list_orders.php');
                }
                if(isset($_GET['All_payments']))
                {
                     include('All_payments.php');
                }
                if(isset($_GET['delete_payment']))
                {
                     include('delete_payment.php');
                }
                if(isset($_GET['list_user']))
                {
                     include('list_user.php');
                }
                if(isset($_GET['delete_user']))
                {
                     include('delete_user.php');
                }
                
            ?>
        </div>

        <!-- Last Child - Footer -->
           <?php
               include "../includes/footer.php";
           ?>

    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

 