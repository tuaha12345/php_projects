<?php // php 1

    $get_orders="SELECT * FROM user_payments";
    $result=mysqli_query($con,$get_orders);
    $rows_count=mysqli_num_rows($result);
    // echo $rows_count;

    if($rows_count>0)
    {

   // end php 1   
   	?> 



<h1 class="text-center text-success">All Payments</h1>
<table class="table table-bordered mt-5">
	<thead >
		<th class="bg-warning text-center">Sl no</th>
		<th class="bg-warning text-center">Invoice number</th>
		<th class="bg-warning text-center">Amount</th>
		<th class="bg-warning text-center">Payment mode</th>
        <th class="bg-warning text-center">Order Date</th>
		<th class="bg-warning text-center">Delete</th>
	</thead>
	<tbody>

<?php // php 2
      $num=1;
      while($row=mysqli_fetch_assoc($result))
      {
      	    $order_id=$row['order_id'];
         	$payment_id=$row['payment_id'];
          	$amount=$row['amount'];
          	$invoice_number=$row['invoice_number'];
          	$payment_mode=$row['payment_mode'];
          	$order_date=$row['date'];
          	// $order_status=$row['order_status'];

          	echo "
          	    <tr>
          	       <td class='text-center'>$num</td>
          	       <td class='text-center'>$invoice_number</td>
          	        <td class='text-center'>$amount</td>
          	       <td class='text-center'>$payment_mode</td>
          	       <td class='text-center'>$order_date</td>
          	       <td class='text-center'>
          	       <a href='index.php?delete_payment=$payment_id' class='text-danger'>
					<i class='fa-solid fa-trash'></i>
				   </a>
          	       </td>

          	    </tr>

          	     ";

            $num++;
      }


// end php 2
?>		


		
		
	</tbody>
</table>




	<?php

      } //---- end of ---> if($rows_count>0)

      else
      {
      	echo "<h1 class='text-center text-danger'> No payments received yet</h1>"; 
      }

    ?>