<?php // php 1

    $get_orders="SELECT * FROM user_orders";
    $result=mysqli_query($con,$get_orders);
    $rows_count=mysqli_num_rows($result);
    // echo $rows_count;

    if($rows_count>0)
    {

   // end php 1   
   	?> 



<h1 class="text-center text-success">All Orders</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Sl no</th>
		<th class="bg-warning text-center">Due Ammount</th>
		<th class="bg-warning text-center">Invoice number</th>
		<th class="bg-warning text-center">Total products</th>
        <th class="bg-warning text-center">Order Date</th>
		<th class="bg-warning text-center">Status</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>

<?php // php 2
      $num=1;
      while($row=mysqli_fetch_assoc($result))
      {
      	    $order_id=$row['order_id'];
         	$user_id=$row['user_id'];
          	$amount_due=$row['amount_due'];
          	$invoice_number=$row['invoice_number'];
          	$total_products=$row['total_products'];
          	$order_date=$row['order_date'];
          	$order_status=$row['order_status'];

          	echo "
          	    <tr>
          	       <td class='text-center'>$num</td>
          	       <td class='text-center'>$amount_due</td>
          	       <td class='text-center'>$invoice_number</td>
          	       <td class='text-center'>$total_products</td>
          	       <td class='text-center'>$order_date</td>
          	       <td class='text-center'>$order_status</td>
          	       <td class='text-center'>
          	       <a href='index.php?delete_orders=$order_id' class='text-danger'>
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
       //   $get_products="SELECT * FROM products";
       //   $result=mysqli_query($con,$get_products);
       //   $num=1;
       //   while ($row=mysqli_fetch_assoc($result)) {
       //   	$product_id=$row['product_id'];
       //   	$product_title=$row['product_title'];
       //   	$product_image=$row['product_image1'];
       //   	$product_price=$row['product_price'];
       //   	$status=$row['status'];

       //   	// for total sold:
       //   	$get_total_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
       //   	$result_count=mysqli_query($con,$get_total_count);
       //   	$rows_count=mysqli_num_rows($result_count);


       //   	       echo " 
       // <tr class='text-center'>
	// 		<td class='bg-light'>$num</td>
	// 		<td class='bg-light'>$product_title</td>
	// 		<td class='bg-light'>
	// 		 <img src='./product_images/$product_image' alt='$product_image' class='admin_img' >
	// 		</td>
	// 		<td class='bg-light'>$product_price /-</td>
	// 		<td class='bg-light'>$rows_count</td>
	// 		<td class='bg-light'>$status</td>
	// 		<td class='bg-light'>
	// 			<a href='index.php?edit_products=$product_id' class='text-success'>
	// 				<i class='fa-solid fa-pen-to-square'></i>
	// 			</a>
	// 		</td>
	// 		<td class='bg-light'>
	// 			<a href='index.php?delete_products=$product_id' class='text-danger'>
	// 				<i class='fa-solid fa-trash'></i>
	// 			</a>
	// 		</td>
	// 	</tr> ";

	// 	$num++;

       //   }
 



        ?>
		
		
	</tbody>
</table>




	<?php

      } //---- end of ---> if($rows_count>0)

      else
      {
      	echo "<h1 class='text-center text-danger'> There are no order</h1>"; 
      }

    ?>