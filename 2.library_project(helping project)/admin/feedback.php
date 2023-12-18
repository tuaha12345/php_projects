<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
    <title>Feedback</title>
</head>
<body class="feedback">
    <div class="feed_img">
        <div class="box3">
            <h2>If you have any suggesion or question please write below:</h2>
            <form action="" method="post">
                <input class="form-control" type="text" name="comment" placeholder="Write Something......" required=""><br>
                <input class="btn btn-default" type="submit" name="submit" value="Comment" style="color: black; height: 35px; width: 100px;">
            </form>

        	<br>
				<?php
					if(isset($_POST['submit']))
					{
						$sql="INSERT INTO `comments`(`id`, `username`, `comment`, `date_time`, `status`) VALUES (NULL, 'ADMIN','$_POST[comment]', current_timestamp(), '1')";
						if(mysqli_query($db,$sql))
						{
							$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
							$res=mysqli_query($db,$q);
				?>
							<table class='table table-bordered' style="width:99%">
								<thead>
									<tr style="font-size: 20px; font-family: Lucida Console;">
										<th>Username</th>
										<th>Comment</th>
										<th>Date_Time</th>
									</tr>
								</thead>
								</table>
								<table class='table table-bordered'>
								<?php
								while ($row=mysqli_fetch_assoc($res)) 
								{
									$timestamp = strtotime($row['date_time']);
									$date = date("Y-m-d h:i:sa", $timestamp);	
									echo "<tr>";
										echo "<td>"; echo $row['username']; echo "</td>";
										echo "<td>"; echo $row['comment']; echo "</td>";
										echo "<td>"; echo $date; echo "</td>";
									echo "</tr>";
								}
								echo "</table>";
						}
					}

					else
					{
						$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
						$res=mysqli_query($db,$q);
						?>
						<table class='table table-bordered' style="width:99%">
							<thead>
								<tr style=" font-size: 18px; font-family: Lucida Console;">
									<th>Username</th>
									<th>Comment</th>
									<th>Date_Time</th>
								</tr>
							</thead>
							</table>
							<div class="feed_scroll_scroll">
							<table class='table table-bordered'>
							<?php
							while ($row=mysqli_fetch_assoc($res)) 
							{
								$timestamp = strtotime($row['date_time']);
								$date = date("Y-m-d h:i:sa", $timestamp);	
								echo "<tr>";
									echo "<td>"; echo $row['username']; echo "</td>";
									echo "<td>"; echo $row['comment']; echo "</td>";
									echo "<td>"; echo $date; echo "</td>";
								echo "</tr>";
							}
						echo "</table>";
					}
							?>
			</div>
		</div>
	</div>
</body>
<?php include '../inc/footer.php'; ?>
