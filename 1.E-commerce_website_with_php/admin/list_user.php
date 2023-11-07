<?php // php 1

    $get_users="SELECT * FROM user_table";
    $result=mysqli_query($con,$get_users);
    $rows_count=mysqli_num_rows($result);
    // echo $rows_count;

    if($rows_count>0)
    {

   // end php 1   
   	?> 



<h1 class="text-center text-success">All Users</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Sl no</th>
		<th class="bg-warning text-center">Username</th>
		<th class="bg-warning text-center">User email</th>
		<th class="bg-warning text-center">User Image</th>
        <th class="bg-warning text-center">User address</th>
		<th class="bg-warning text-center">user mobile</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>

<?php // php 2
      $num=1;
      while($row=mysqli_fetch_assoc($result))
      {
         	$user_id=$row['user_id'];
          	$user_name=$row['user_name'];
          	$user_email=$row['user_email'];
          	$user_image=$row['user_image'];
          	$user_address=$row['user_address'];
          	$user_mobile=$row['user_mobile'];

          	echo "
          	    <tr>
          	       <td class='text-center'>$num</td>
          	       <td class='text-center'>$user_name</td>
          	       <td class='text-center'>$user_email</td>
          	       <td class='text-center'>
          	       <img src='../user_area/user_image/$user_image' alt='$user_image' class='admin_img' >
          	       </td>
          	       <td class='text-center'>$user_address</td>
          	       <td class='text-center'>$user_mobile</td>
          	       <td class='text-center'>
          	       <a href='index.php?delete_user=$user_id' class='text-danger'>
					<i class='fa-solid fa-trash'></i>
				   </a>
          	       </td>

          	    </tr>

          	     ";

            $num++;
      }


// end php 2
?>		


        <?php

        ?>
		
		
	</tbody>
</table>




	<?php

      } //---- end of ---> if($rows_count>0)

      else
      {
      	echo "<h1 class='text-center text-danger'> There are no user</h1>"; 
      }

    ?>