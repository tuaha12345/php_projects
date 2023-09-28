<?php
include 'connection.php';
$get_id=$_GET['Update_id'];

$sql = "SELECT * FROM crud WHERE id=$get_id ";
$res = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);




if(isset($_POST['submit']))
{   
	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE crud SET id='$get_id', name='$name', email='$email', mobile='$mobile', password='$password'  WHERE id=$get_id ";

    $res = mysqli_query($conn, $sql);

    if($res)
    {
    
        // Redirect to a "...." page or a success message page
        header("Location: display.php"); 


        //OR
          // Redirect back to the current page
        //--->header("Location: " . $_SERVER['PHP_SELF']);

        exit(); // Stop further execution
    }
    else
    {
        die(mysqli_error($conn));
    }


}
?>

<!-- /////////// delcear global variable
<//?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
?> -->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>UPDATE</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $row['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mobile</label>
            <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
        </div>

        <button type="submit" class="btn btn-success" name="submit" value="submit">Update</button>
    </form>
</div>
</body>
</html>
