
<h1 class="text-center text-success">All Brands</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Slno</th>
		<th class="bg-warning text-center">Brand Title</th>
		<th class="bg-warning text-center">Edit</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>
        <?php
         $get_brands="SELECT * FROM brands";
         $result=mysqli_query($con,$get_brands);
         $num=1;
         while ($row=mysqli_fetch_assoc($result)) {
         	$brand_id=$row['brand_id'];
         	$brand_title=$row['brand_title'];

         	       echo " 
       <tr class='text-center'>
			<td class='bg-light'>$num</td>
			<td class='bg-light'>$brand_title</td>
			<td class='bg-light'>
				<a href='index.php?edit_brands=$brand_id' class='text-success'>
					<i class='fa-solid fa-pen-to-square'></i>
				</a>
			</td>
			<td class='bg-light'>
				<a href='index.php?delete_brands=$brand_id' class='text-danger' data-bs-toggle='modal' data-bs-target='#exampleModal$brand_id'>
					<i class='fa-solid fa-trash'></i>
				</a>
			</td>
		</tr> 


        <!-------------- modal----------------------->
		<div class='modal fade' id='exampleModal$brand_id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		  <div class='modal-dialog'>
		    <div class='modal-content'>
		      <div class='modal-body'>
		        <h4>Are you sure to delete this iteam?</h4>
		      </div>
		      <div class='modal-footer'>
		        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
		        <button type='button' class='btn btn-danger'>
		        	<a href='index.php?delete_brands=$brand_id' class='text-light text-decoration-none' >Yes
					</a>		
		        </button>
		      </div>
		    </div>
		  </div>
		</div>

		"; // end of echo 

		$num++;

         }
 

        ?>
		
		
	</tbody>
</table>





