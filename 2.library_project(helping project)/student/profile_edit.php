<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>
<head>
	<title>Edit My Profile</title>
</head>
<body  class="profile">
	<div class="container">
        <div class="wrapper">
			<h2 style="text-align: center; font-weight: bold;">EDIT PERSONAL INFORMATION</h2><br>
			<?php
				
				$sql = "SELECT * FROM `student` WHERE `username`='$_SESSION[login_user]'";
				$result = mysqli_query($db,$sql) or die (mysqli_error($db));

				while ($row = mysqli_fetch_assoc($result)) 
				{
					$username=$row['username'];
					$department=$row['department'];
					$roll=$row['roll'];
					$email=$row['email'];
					$contact=$row['phone'];
				}
			?>

			<form action="" method="post" enctype="multipart/form-data">

				<div>	<h5>Username: &nbsp;
					<?php echo $username; ?></h5></div>
				<br>

				<label><h5>Department</h5>
					<input class="form-control" type="text" name="department" value="<?php echo $department; ?>">
				</label>

				<label><h5>Roll</h5>
					<input class="form-control" type="text" name="roll" value="<?php echo $roll; ?>">
				</label>

				<label><h5>Email</h5>
					<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
				</label>

				<label><h5>Contact No</h5>
					<input class="form-control" type="text" name="phone" value="<?php echo $contact; ?>">
				</label><br>

				<div style="padding-left: 100px;">
					<button style="font-weight: bold; background-color: orange;     margin-left: 12vh; width:80px;" class="btn btn-default" type="submit" name="submit">save</button><br><br>
				</div>
			</form>
			<a style="font-weight: bolder; font-size: 15px;" href="../update_student_password.php">Change password?</a>
        	<a style="font-weight: bolder; float: right; font-size: 15px;" href="profile_pic_upload.php">Change Profile picture?</a>
		</div>
	</div>
	<?php include '../inc/footer.php'; ?>
</body>

	<?php 

		if(isset($_POST['submit']))
		{
			$username=$_POST['username'];
			$department=$_POST['department'];
			$roll=$_POST['roll'];
			$email=$_POST['email'];
			$contact=$_POST['phone'];

			$sql1= "UPDATE `student` SET `department`='$department', `roll`='$roll', email='$email', `phone`='$contact' WHERE `username`='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{			    
			    ?>
			    <script type="text/javascript">
					window.confirm("Saved Successfully and Loggingout Now.");
					window.location="../inc/logout.php";
				</script>
				<?php
			}
		}
 	?>
