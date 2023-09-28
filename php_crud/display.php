<?php 
  	include 'connection.php';
  	 $sql = "SELECT * FROM crud ";
     $res = mysqli_query($conn, $sql);


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP DATA DISPLAY!</title>
</head>
<body>
<div class="container my-5">
	<a class="btn btn-info" href="insert.php">Insert New Data</a>

	<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
    </tr>
  </thead>


  <tbody>

  	<?php 

    if($res)
    {
    	
    	while ($row=mysqli_fetch_assoc($res)) {
    		echo '  <tr>
			      <th scope="row">'.$row['id'].'</th>
			      <td>'.$row['name'].'</td>
			      <td>'.$row['email'].'</td>
			      <td>'.$row['mobile'].'</td>
			      <td>'.$row['password'].'</td>
			      <td>
			      <a class="btn btn-primary" href="update.php? Update_id='.$row['id'].'">UPDATE</a>
                  <a class="btn btn-danger" href="delete.php? Delete_id='.$row['id'].' ">Delete</a>
				   </td>
			    </tr> ';

    	}
    }
    else
    {
        die(mysqli_error($conn));
    }

  	?>


    
  </tbody>

</table>

</div>
</body>
</html>
