<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Edit My Profile</title>
</head>
<body  class="profile">
	<div class="container">
        <div class="wrapper">
			<h2 style="text-align: center; font-weight: bold;">EDIT PERSONAL INFORMATION</h2><br><br>
			<?php
				
				$sql = "SELECT * FROM `admin` WHERE `username`='$_SESSION[login_user]'";
				$result = mysqli_query($db,$sql) or die (mysqli_error($db));

				while ($row = mysqli_fetch_assoc($result)) 
				{
					$username=$row['username'];
					$email=$row['email'];
					$contact=$row['phone'];
				}
			?>

			<form action="" method="post" enctype="multipart/form-data">
				<label><h5>Username</h5>
					<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
				</label>

				<label><h5>Email</h5>
					<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
				</label>

				<label><h5>Contact No</h5>
					<input class="form-control" type="text" name="phone" value="<?php echo $contact; ?>">
				</label><br><br>

				<div style="padding-left: 100px;">
					<button style="font-weight: bold; background-color: orange;     margin-left: 12vh; width:80px;" class="btn btn-default" type="submit" name="submit">save</button><br><br>
				</div>
			</form>
			<a style="font-weight: bolder; font-size: 15px;" href="../update_admin_password.php">Change password?</a>
        	<a style="font-weight: bolder; float: right; font-size: 15px;" href="profile_pic_upload.php">Change Profile picture?</a>
		</div>
	</div>
</body>
<?php include '../inc/footer.php'; ?>
	<?php 

		if(isset($_POST['submit']))
		{

			$username=$_POST['username'];
			$email=$_POST['email'];
			$contact=$_POST['phone'];

			$sql1= "UPDATE `admin` SET `username`='$username', email='$email', `phone`='$contact' WHERE `username`='".$_SESSION['login_user']."';";

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
