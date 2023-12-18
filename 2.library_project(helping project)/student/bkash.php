<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>

<head>
    <title>Books</title>
    <style type="text/css">
    	.row{
    		width:1200px;
    		display: flex;
    		 align-items: center;
            justify-content: center;
    	}


    	.col-2
    	{
    		width:500px;
    		background: transparent;
    	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(175, 189, 179, 0.19);
         text-align: center;
         color: dimgray;
         padding: 10px;
         margin: 15px;
    		
    	}

    	input[type=text], select {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
			}


    </style>
</head>

<body class="books">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="payment_options.php">Payment</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
        <div class="h"><a href="fine.php">Fine List</a></div>

    </div>

    <div id="main">
                <h5 style="text-align: center; color:dimgray; font-weight:bolder;">Due fee:
                <?php
                $username = $_SESSION['login_user'] ;
                $sql = "SELECT fine FROM fine WHERE username = '$username'";
                            $result = mysqli_query($db, $sql);
                            if ($result) {
                                $fineAmount=0;
                                while($row=mysqli_fetch_array($result))
                                { 
                                  $fineAmount+= $row['fine'];
                                }
                                echo "<p style='color:#F89624'>$fineAmount</p>";
                            }

                ?>
        </h5>
        <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">
            <div class="row" >
            	<div class="col-md-6 col-2">
            		<img src="images/bkash.png" class="img p">
            		<h3 style="font-weight: bold; color:#ED0A80"><strong style="color:dimgray">Account Number:</strong>
            		+88015269453</h3>
            		
				  <form action="bkash.php" method="post">
				    <label for="fname">Your bkash number:</label>
				    <input type="text"  name="bkash_number" placeholder="Your bkash number....">

				    <label for="lname">Trans ID:</label>
				    <input type="text"  name="trans_id" placeholder="Your trans id..">

				    <label for="lname">Paid Amount</label>
				    <input type="text"  name="paid_amount" placeholder="Paid Amount">

                    <input type="hidden" name="payment_method" value="bkash">

				    <input type="submit" value="Submit" name="submit" >
				  </form>


            	</div>
            	
            </div>

        </div>
    </div>
</body>

<?php
if(isset($_POST['submit']))
{
$username = $_SESSION['login_user'] ;
$sql = "SELECT email FROM student WHERE username = '$username'";
$result = mysqli_query($db, $sql);
// Fetch the result
$row = mysqli_fetch_assoc($result);
$email = $row['email'];


// due amount
$sql_due = "SELECT fine FROM fine WHERE username = '$username'";
            $result_due = mysqli_query($db, $sql_due);

            if ($result_due) {
                $fineAmount=0;
                while($row=mysqli_fetch_array($result_due))
                {  
                  $fineAmount+= $row['fine'];
                }
            }

$account_number=$_POST['bkash_number'];
$trans_id=$_POST['trans_id'];
$payment_method=$_POST['payment_method'];
$pay_amount=$_POST['paid_amount'];

$status='pending';

$sqlInsert = "INSERT INTO online_payment (username,email,account_number,trans_id,payment_method,pay_amount,due,status) VALUES ('$username','$email','$account_number','$trans_id','$payment_method','$pay_amount','$fineAmount','$status')";

        // Perform the insertion query
        $result=mysqli_query($db, $sqlInsert);

          echo "<h3 class='text-center'>Successfully completed the payment</h3>";
          echo "<script>window.open('index.php','_self')</script>";

}


?>


<?php include '../inc/footer.php'; ?>

</html>