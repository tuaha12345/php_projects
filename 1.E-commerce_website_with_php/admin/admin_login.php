<?php 
include '../includes/connect.php';
//include '../function/common_function.php';
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
    <div class="container-fluid mt-3 pt-5">
     <h1 class='text-center text-warning fw-bold'>Admin Login</h1>
    </div>

    <div class="row d-flex justify-content align-items-center">
        <div class="col-lg-6 col-xl-5">
        	<img src="../images/admin_login.png" alt="Admin Registration" class="img-fluid">
        </div>

        <div class="col-lg-6 col-xl-5">
        	<form method="post">

        	  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Username</label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="admin_name" required>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
			  </div>

					<!-- submit-->
					<div class="mt-5">
						<input type="submit" name="admin_login" class="btn btn-warning text-light fw-bold" value="Login">
						<p class="small fw-bold mt-2 mb-0"> 
						Don't have any account?
						<a href="admin_registration.php" class="text-danger">Register</a>
						</p>
					</div>
			</form>
        </div>
            
    </div>



    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

 <!-- php code--->
<?php 

if(isset($_POST['admin_login']))
{
	$admin_name=$_POST['admin_name'];
	$admin_password=$_POST['password'];

    //// for checking  whether the username registered or not
	$select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name' ";
	$result=mysqli_query($con,$select_query);
	$row_count=mysqli_num_rows($result);
	$row_data=mysqli_fetch_assoc($result);



	///for checking any cart iteam added or not
	// $user_ip=getIPAddress();

	// $select_query_for_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip' ";
	// $result=mysqli_query($con,$select_query_for_cart);
	// $row_count_cart=mysqli_num_rows($result);




    // checking conditions.....
	if($row_count>0)
	{    

		 $_SESSION['admin_name']=$admin_name; 

	  if(password_verify($admin_password, $row_data['admin_password']))
	  { 
	  	 echo "<script>alert('Login Successful')</script>";
	  	 	echo "<script>window.open('./index.php','_self')</script>";
	  }

	  else{
        echo "<script>alert('Invalid Credentials')</script>";
	  }

    }

    
    else{
    	echo "<script>alert('Invalid Credentials')</script>";
    	}





}




?>