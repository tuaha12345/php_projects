<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Book Edit</title>
</head>

<body class="add_books">
        <div class="add_books">
            <h3 style="text-align: center; ">Edit New Books Information</h3><br>
            <?php
				
				$sql = "SELECT * FROM `info_books` WHERE `b_id`='$_SESSION[bid]'";
				$result = mysqli_query($db,$sql);

				while ($row = mysqli_fetch_assoc($result)) 
				{
					$bid=$row['b_id'];
					$name=$row['b_name'];
					$authors=$row['auth_name'];
					$edition=$row['edition'];
					$quantity=$row['isbn'];
					$department=$row['publisher'];
				}
			?>

            <form action="" method="post">

            <div>	<h5>Book_Id: &nbsp;
                <?php echo $b_id; ?></h5></div>
            <div>	<h5>Book_Name: &nbsp;
                <?php echo $b_name; ?></h5></div>
            <br>

            <label><h5>Author_Name</h5>
                <input class="form-control" type="text" name="auth_name" value="<?php echo $auth_name; ?>">
            </label>
 
            <label><h5>Edition</h5>
                <input class="form-control" type="text" name="edition" value="<?php echo $edition; ?>">
            </label>

            <label><h5>ISBN </h5>
                <input class="form-control" type="text" name="isbn" value="<?php echo $isbn; ?>">
            </label><br><br>
			
			<label><h5>Publisher </h5>
                <input class="form-control" type="text" name="publisher" value="<?php echo $publisher; ?>">
            </label><br><br>

            <div style="padding-left: 100px;">
                <button style="font-weight: bold; background-color: orange;     margin-left: 12vh; width:80px;" class="btn btn-default" type="submit" name="submit">save</button><br><br>
            </div>
            </form>
        </div>
</body>

<?php 

if(isset($_POST['submit']))
{

    $auth_name=$_POST['auth_name'];
    $edition=$_POST['edition'];
    $isbn=$_POST['isbn'];
    $publisher=$_POST['publisher'];

    $sql1= "UPDATE `info_books` SET `auth_name`='$auth_name', `edition`='$edition', `isbn`='$isbn', `publisher`='$publisher' WHERE `b_id`='".$_SESSION['b_id']."';";

    if(mysqli_query($db,$sql1))
    {
        ?>
            <script type="text/javascript">
                window.confirm("Saved Successfully.");
                window.location="new_books_info.php";
            </script>
        <?php
    } 
}
?>
