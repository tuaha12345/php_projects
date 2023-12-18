<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>

<head>
	<title>Book Request</title>
</head>
<body class="books">	
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="report_paper.php">Reports</a></div>
        <div class="h"><a href="payment_options.php">Payment</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="report_request.php">Report Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
        <div class="h"><a href="fine.php">Fine List</a></div>
	</div>
	<div id="main">
	
		<span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>
		<div class="container">
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
					$q=mysqli_query($db,"SELECT * from issue_book  INNER JOIN `books` ON `books`.`bid` = `issue_book`.`bid`  where username='$_SESSION[login_user]' and approve='' ;");

					if(mysqli_num_rows($q)==0)
					{
						echo "<h2>There's no pending request<h2>";
					}
					else
					{
				echo "<table class='table table-bordered table-hover' >";
					echo "<tr style='background-color: #61c6e4;'>";
						echo "<th>"; echo "Book-ID";  echo "</th>";
						echo "<th>"; echo "Book-Name";  echo "</th>";
						echo "<th>"; echo "Request Date";  echo "</th>";
					echo "</tr>";	

					while($row=mysqli_fetch_assoc($q))
					{
						echo "<tr>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['request_date']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
					}
				}
				?>
		</div>
	</div>
</body>
