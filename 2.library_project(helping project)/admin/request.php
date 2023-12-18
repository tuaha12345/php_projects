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
					<input type="text" name="bid" class="form-control" placeholder="book id..." required="">
					<button style="background-color: #61c6e4;" class="btn btn-default" name="submit" type="submit">Approve</button>
				</form>
			</div>

			<h3 style="text-align: center;">Request of Book</h3>

			<?php
			
				$sql= "SELECT
						`issue_book`.`request_date`,
						`student`.`username`,
						`roll`,
						`books`.`bid`,
						`name`,
						`authors`,
						`edition`,
						`status`
					FROM
						`student`
					INNER JOIN `issue_book` ON `student`.`username` = `issue_book`.`username`
					INNER JOIN `books` ON `issue_book`.`bid` = `books`.`bid`
					WHERE
						`issue_book`.`approve` = ''";
				$res= mysqli_query($db,$sql);

				if(mysqli_num_rows($res)==0)
					{
						echo "<h2><b>";
						echo "There's no pending request.";
						echo "</h2></b>";
					}
				else
				{
					echo "<table class='table table-bordered' style='width:99%;'>";
						echo "<tr style='background-color:#61c6e4;'>";
							echo "<th>"; echo "Request date";  echo "</th>";
							echo "<th>"; echo "Username";  echo "</th>";
							echo "<th>"; echo "Book-ID";  echo "</th>";
							echo "<th>"; echo "Book Name";  echo "</th>";
							echo "<th>"; echo "Authors Name";  echo "</th>";
							echo "<th>"; echo "Edition";  echo "</th>";
							echo "<th>"; echo "Status";  echo "</th>";
						echo "</tr>";	
						echo "</table>";	
						echo "<div class='scroll'>";
						echo "<table class='table table-bordered' style='width:100%;'>";
						while($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
								echo "<td>"; echo $row['request_date']; echo "</td>";
								echo "<td>"; echo $row['username']; echo "</td>";
								echo "<td>"; echo $row['bid']; echo "</td>";
								echo "<td>"; echo $row['name']; echo "</td>";
								echo "<td>"; echo $row['authors']; echo "</td>";
								echo "<td>"; echo $row['edition']; echo "</td>";
								echo "<td>"; echo $row['status']; echo "</td>";								
							echo "</tr>";
						}
					echo "</table>";
					echo "</div>";
				}
			if(isset($_POST['submit']))
			{
				$_SESSION['name']=$_POST['username'];
				$_SESSION['bid']=$_POST['bid'];

				?>
					<script type="text/javascript">
						window.location="approve.php"
					</script>
				<?php
			}

			?>
		</div>
	</div>
</body>
