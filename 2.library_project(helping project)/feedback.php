<?php
include 'inc/connect.php';
include 'navigation.php';
?>
<head>
    <title>Feedback</title>
</head>
<body>
    <div class="feed_img">
        <div class="box3">
            <h2 style="text-align: center; font-weight: bold;">FEEDBACK</h2>
        	<br><br>
				<?php
						$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
						$res=mysqli_query($db,$q);
						?>
						<table class='table table-bordered'style="width:99%">
							<thead>
								<tr>
									<th>USERNAME</th>
									<th>COMMENT</th>
									<th>DATE_TIME</th>
								</tr>
							</thead>
							</table>
							<div class="feed_scroll">
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
							?>
			</div>
		</div>
	</div>
</body>
<?php include 'inc/footer.php'; ?>
