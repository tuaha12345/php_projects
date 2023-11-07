
<h1 class="text-center text-success">All products</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Product ID</th>
		<th class="bg-warning text-center">Product Title</th>
		<th class="bg-warning text-center">Product Image</th>
		<th class="bg-warning text-center">Product Price</th>
		<th class="bg-warning text-center">Total Sold</th>
		<th class="bg-warning text-center">Status</th>
		<th class="bg-warning text-center">Edit</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>
        <?php
         $get_products="SELECT * FROM products";
         $result=mysqli_query($con,$get_products);
         $num=1;
         while ($row=mysqli_fetch_assoc($result)) {
         	$product_id=$row['product_id'];
         	$product_title=$row['product_title'];
         	$product_image=$row['product_image1'];
         	$product_price=$row['product_price'];
         	$status=$row['status'];

         	// for total sold:
         	$get_total_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
         	$result_count=mysqli_query($con,$get_total_count);
         	$rows_count=mysqli_num_rows($result_count);


         	       echo " 
       <tr class='text-center'>
			<td class='bg-light'>$num</td>
			<td class='bg-light'>$product_title</td>
			<td class='bg-light'>
			 <img src='./product_images/$product_image' alt='$product_image' class='admin_img' >
			</td>
			<td class='bg-light'>$product_price /-</td>
			<td class='bg-light'>$rows_count</td>
			<td class='bg-light'>$status</td>
			<td class='bg-light'>
				<a href='index.php?edit_products=$product_id' class='text-success'>
					<i class='fa-solid fa-pen-to-square'></i>
				</a>
			</td>
			<td class='bg-light'>
				<a href='index.php?delete_products=$product_id' class='text-danger'>
					<i class='fa-solid fa-trash'></i>
				</a>
			</td>
		</tr> ";

		$num++;

         }
 



        ?>
		
		
	</tbody>
</table>
