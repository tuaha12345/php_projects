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
			<h2 style="text-align: center; font-weight: bold;">UPLOAD NEW<br>PROFILE PICTURE</h2><br>
			<?php
				  echo "<div style='text-align: center; margin-bottom: 20px;'>
                            <img class='img-circle profile-img'  height=100 width=105 src='../assets/images/".$_SESSION['pic']."'>
                        </div>";
			?>

			<form action="" method="post" enctype="multipart/form-data">
				<h5>Choose a profile picture</h5>
					<input class="form-control" type="file" name="file">
				<br><br>

				<div style="padding-left: 100px;">
					<button style="font-weight: bold; background-color: orange; margin-left: 12vh; width:80px;" class="btn btn-default" type="submit" name="submit">save</button><br><br>
				</div>
			</form>
		</div>
	</div> 
</body>
<?php include '../inc/footer.php'; ?>

	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"../assets/images/".$_FILES['file']['name']);
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE `student` SET pic='$pic' WHERE `username`='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully and Loggingout Now.");
						window.location="../inc/logout.php";
					</script>
				<?php
			} 
		}
 	?>