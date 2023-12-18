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

    <div style="padding: 10px; ">
     <h2 style="color: #61C6E4; text-align:center">Report Surveillance</h2>
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
	            echo "<th>Report status</th>";
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
	                if($row['report_request']=="Clear")
	                {
	                	echo "<td>Not Avaliable</td>";
	                }
	                else{
	                	echo "<td>Avaliable</td>";
	                }

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


		</div>
	</div>
</body>
