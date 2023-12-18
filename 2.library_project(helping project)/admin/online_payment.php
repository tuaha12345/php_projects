<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
	<title>Online payment</title>
</head>
<body class="books">	
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="h"> <a href="books.php">Books</a></div>
		<div class="h"> <a href="add_books.php">Add Books</a></div>
		<div class="h"> <a href="request.php">Book Request</a></div>
		<div class="h"> <a href="issue_info.php">Issue Information</a></div>
		<div class="h"> <a href="expired.php">Expired List</a></div>
		<div class="h"> <a href="fine.php">Fine List</a></div>
	</div>

	<div id="main">
		<span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>
		<script>
			function openNav() {
			document.getElementById("mySidenav").style.width = "300px";
			document.getElementById("main").style.marginLeft = "300px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
			}

			function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
			document.body.style.backgroundColor = "white";
			}
		</script>
			<div class="srch">
				<br>
				<form class="navbar-form" method="post" action="" name="form1">
					<input type="text" name="username" class="form-control" placeholder="username..." required="">
					<input type="text" name="id" class="form-control" placeholder="user id..." required="">
					<button style="background-color: #61c6e4;" class="btn btn-default" name="submit" type="submit">Approve</button>
				</form>
			</div>

			<h3 style="text-align: center;">Online payment</h3>

			<?php
			
				$sql= "SELECT * FROM online_payment";
				$res= mysqli_query($db,$sql);
				// echo "<h1>Total due: $total_due</h1>";


				if(mysqli_num_rows($res)==0)
					{
						echo "<h2><b>";
						echo "There's no online payment request.";
						echo "</h2></b>";
					}
				else
				{
					echo "<table class='table table-bordered' style='width:99%;'>";
						echo "<tr style='background-color:#61c6e4;'>";
							echo "<th>"; echo "User Id";  echo "</th>";
							echo "<th>"; echo "Username";  echo "</th>";
							echo "<th>"; echo "Email";  echo "</th>";
							echo "<th>"; echo "Payment number";  echo "</th>";
							echo "<th>"; echo "Trans id";  echo "</th>";
							echo "<th>"; echo "Payment Gateway";  echo "</th>";
							echo "<th>"; echo "Pay Amount";  echo "</th>";
							echo "<th>"; echo "Due";  echo "</th>";
							echo "<th>"; echo "Status";  echo "</th>";
							echo "<th>"; echo "Payment date";  echo "</th>";
						echo "</tr>";	
						echo "</table>";	
						echo "<div class='scroll'>";
						echo "<table class='table table-bordered' style='width:100%;'>";
						while($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
								echo "<td>"; echo $row['id']; echo "</td>";
								echo "<td>"; echo $row['username']; echo "</td>";
								echo "<td>"; echo $row['email']; echo "</td>";
								echo "<td>"; echo $row['account_number']; echo "</td>";
								echo "<td>"; echo $row['trans_id']; echo "</td>";
								echo "<td>"; echo $row['payment_method']; echo "</td>";
								echo "<td>"; echo $row['pay_amount']; echo "</td>";
								echo "<td>"; echo $row['due']; echo "</td>";
								echo "<td>"; echo $row['status']; echo "</td>";	
								echo "<td>"; echo $row['time']; echo "</td>";			    						
							echo "</tr>";
						}
					echo "</table>";
					echo "</div>";
				}
			


				?>
					



<?php
if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $id = $_POST['id'];
    $username = $_POST['username'];

    // Fetch the payment details for the specified id and username
    $sqlPayment = "SELECT * FROM online_payment WHERE id = '$id' AND username = '$username'";
    $resultPayment = mysqli_query($db, $sqlPayment);

    if ($resultPayment && mysqli_num_rows($resultPayment) > 0) {
        $rowPayment = mysqli_fetch_assoc($resultPayment);
        $paidAmount = $rowPayment['pay_amount'];
        $dueAmount = $rowPayment['due'];

        // Calculate the remaining due amount
        $remainingDue = $dueAmount - $paidAmount;

        // Update the status and due in the online_payment table
        $sqlUpdate = "UPDATE online_payment SET status = 'Clear', due = $remainingDue WHERE id = '$id' AND username = '$username'";
        $resultUpdate = mysqli_query($db, $sqlUpdate);

        if ($resultUpdate) {
            echo "<h3 class='text-center'>Successfully completed the payment</h3>";
            echo "<script>window.open('online_payment.php','_self')</script>";
        } else {
            echo "<p>Error updating status: " . mysqli_error($db) . "</p>";
        }
    } else {
        echo "<p>Payment details not found</p>";
    }
}
?>

		</div>
	</div>
</body>
