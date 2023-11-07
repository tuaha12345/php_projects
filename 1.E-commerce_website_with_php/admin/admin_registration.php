<?php 
include '../includes/connect.php';
include '../function/common_function.php';
//session_start();
?>
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
    <div class="container-fluid m-3">
     <h2 class='text-center'>Admin Registration</h2>
    </div>

    <div class="row d-flex justify-content ">
        <div class="col-lg-6 col-xl-5">
        	<img src="../images/admin.png" alt="Admin Registration" class="img-fluid">
        </div>

        <div class="col-lg-6 col-xl-5">
        	<form method="post">

        	  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Username</label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="admin_name" required>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password" required>
			  </div>

			  <!-- submit-->
			    <div class="">
					<input type="submit" name="admin_register" class="btn btn-warning" value="Register">
					<p class="small fw-bold mt-2 mb-0"> 
						Already have an account?
						<a href="admin_login.php" class="text-danger"> Login</a>
					</p>
				</div>
			</form>
        </div>
            
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

 
 <?php
if(isset($_POST['admin_register']))
{
	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['email'];
	$admin_password=$_POST['password'];
	$hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
	$admin_confirm_password=$_POST['confirm_password'];

	//$user_ip=getIPAddress();

	// select query
	$select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name' or admin_email='$admin_email' ";
	$res=mysqli_query($con,$select_query);
	$rows_count=mysqli_num_rows($res);


	if($rows_count>0)
	{
		echo "<script>alert('This Name and Email already exist')</script>";
	}
	else if($admin_password!=$admin_confirm_password)
	{
		echo "<script>alert('Password do not match')</script>";
	}

   else{
   	// insert query

	$insert_query="INSERT INTO admin_table(admin_name,admin_email,admin_password) VALUES('$admin_name','$admin_email','$hash_password')";
	$sql_execute=mysqli_query($con,$insert_query);

	echo "<script>alert('Registration Successfull!!!')</script>";
	echo "<script>window.open('./admin_login.php','_self')</script>";
   }


/// selecting cart items

// $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip' ";
// $result_cart=mysqli_query($con,$select_cart_items);
// $rows_count_for_cart_items=mysqli_num_rows($result_cart);
// if($rows_count_for_cart_items>0)
// {
// 	$_SESSION['username']=$user_name;
// 	echo "<script>alert('You have items in your cart')</script>";
// 	echo "<script>window.open('checkout.php','_self')</script>";
// }

// else
// {
// 	echo "<script>window.open('../index.php','_self')</script>";
// }




}


?>