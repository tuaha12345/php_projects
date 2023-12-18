<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Book Request</title>
</head>
<body class="books">	
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="h"> <a href="paper.php">Papers</a></div>
		<div class="h"> <a href="add_books.php">Add Paper</a></div>
		<div class="h"> <a href="paper_request.php">Paper Request</a></div>
		<div class="h"> <a href="issue_info.php">Issue Information</a></div>
		<div class="h"> <a href="expired.php">Expired List</a></div>
		<div class="h"> <a href="fine.php">Fine List</a></div>
	</div>
	<div id="main">
		<span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>
		<div class="container">
<!------------------------- search ----------------->

    <div style="float: right;padding-top: 10px;">
      <!--------------report id-------->
        <form class="navbar-form" method="post" name="form2" action="">

        	<select class="form-control" name="report_request">
			  <option selected>Report Request</option>
			  <option value="Pending">Pending</option>
			  <option value="Clear">Clear</option>
			</select>

			<select class="form-control" name="report_return">
			  <option selected>Return Status</option>
			  <option value="Yes">Yes</option>
			  <option value="No">No</option>
			</select><br><br>

			<input class="form-control" type="text" name="return_date" placeholder="return_date" required="">

            <input class="form-control" type="text" name="report_id" placeholder="Enter report id" required="">

            <button   style="background-color: #61c6e4;" type="submit" name="submit2" class="btn btn-default">
            <span class="glyphicon">✔️</span>
            </button>
        </form>
    </div>
<!---------------------end of ---- search ----------------->			
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

<?php
if(isset($_SESSION['login_user']))
{       
	$username=$_SESSION['login_user'];
		    // Select all records from the report_tracking table for the logged-in user
	    $sql = "SELECT * FROM report_tracking";
	    $result = mysqli_query($db, $sql);

	    if ($result) {
	        if (mysqli_num_rows($result) > 0) {
	            // Display table header
	            echo "<table class='table table-bordered table-hover' style='width:99%'>";
	            echo "<tr style='background-color: #61c6e4;'>";
	            echo "<th>ID</th>";
	            echo "<th>Username</th>";
	            echo "<th>Report ID</th>";
	            echo "<th>Report Name</th>";
	            echo "<th>Request Time</th>";
	            echo "<th>Return Date</th>";
	            echo "<th>Report Request</th>";
	            echo "<th>Report Return</th>";
	            echo "</tr>";

	            // Display table rows with data
	            while ($row = mysqli_fetch_assoc($result)) {
	                echo "<tr>";
	                echo "<td>" . $row['id'] . "</td>";
	                echo "<td>" . $row['username'] . "</td>";
	                echo "<td>" . $row['report_id'] . "</td>";
	                echo "<td>" . $row['report_name'] . "</td>";
	                echo "<td>" . $row['request_time'] . "</td>";
	                echo "<td>" . $row['return_date'] . "</td>";
	                echo "<td>" . $row['report_request'] . "</td>";
	                echo "<td>" . $row['report_return'] . "</td>";

	                echo "</tr>";
	            }

	            echo "</table>";
	        } else {
	            echo "<h1>No report requests found for the user.</h1>";
	        }
	    } else {
	        echo "Error in executing the query: " . mysqli_error($db);
	    }



}

					
?>

<?php
if (isset($_POST['submit2'])) {
    $report_id = $_POST['report_id'];
    $report_request = $_POST['report_request'];
    $report_return = $_POST['report_return'];
    $return_date = $_POST['return_date'];

    // Update the report_tracking table
    $update_query = "UPDATE report_tracking SET report_request='$report_request', report_return='$report_return', return_date='$return_date' WHERE report_id='$report_id'";
    
    if (mysqli_query($db, $update_query)) {
        
        if(strcasecmp($report_request, "Clear") === 0)
        {
         $update_status = "UPDATE paper SET status='Not Available' WHERE id='$report_id'";
         $run_query=mysqli_query($db, $update_status);
        }
        else
        {
        	 $update_status = "UPDATE paper SET status='Available' WHERE id='$report_id'";
           $run_query=mysqli_query($db, $update_status);
        }

        echo "Record updated successfully";
             echo "<script type='text/javascript'>
            window.location='paper_request.php'
            </script>";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}

?>
		</div>
	</div>
</body>
