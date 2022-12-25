<html>
<head>

<title>Admin page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>

<body style="background-image:url(images/background-img.png);">


<h1 style="text-align:center; color:#CC3300;" > Welcome to the Admin page.</h1>
<br>
<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Plan</th>
                      <th>Address</th>
                      <th>Message</th>


                    </tr>
                  </thead>


                  
                  
                  <tbody>
                  <?php
							require('connect.php');
   							
							$query1=mysqli_query($conn,"select * from admin");
							while($row=mysqli_fetch_array($query1))
								{ 
									
								?>
					<tr>
						
											<td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['number']; ?></td>
                      <td><?php echo $row['plan']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['message']; ?></td>
                      
											
											</a> 
   </td>
											
										</tr>








										<?php } 






										?>   



<div class="delete">



             
     <br>

       <h1>Delete a record using id:</h1>

    <br>




  <form action="connect.php" method="POST">

     	  ID: <input type="text" name="id">
     	
          <input type="submit" name="del" value="Delete" class="input"><br><br>
     	 

    </form>


</div>


                  </tbody>
                </table>
              </div>
            </div>




</body>
</html>

