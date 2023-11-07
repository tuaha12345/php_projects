
<h1 class="text-center text-success">All Categories</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Slno</th>
		<th class="bg-warning text-center">Category Title</th>
		<th class="bg-warning text-center">Edit</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>
        <?php
         $get_categories="SELECT * FROM categories";
         $result=mysqli_query($con,$get_categories);
         $num=1;
         while ($row=mysqli_fetch_assoc($result)) {
         	$category_id=$row['category_id'];
         	$category_title=$row['category_title'];

         	       echo " 
       <tr class='text-center'>
			<td class='bg-light'>$num</td>
			<td class='bg-light'>$category_title</td>
			<td class='bg-light'>
				<a href='index.php?edit_categories=$category_id' class='text-success'>
					<i class='fa-solid fa-pen-to-square'></i>
				</a>
			</td>
			<td class='bg-light'>
				<a href='index.php?delete_categories=$category_id' class='text-danger'>
					<i class='fa-solid fa-trash'></i>
				</a>
			</td>
		</tr> ";

		$num++;

         }
 



        ?>
		
		
	</tbody>
</table>

