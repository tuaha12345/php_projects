<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Book Edit</title>
    <style>
        #bookshelf{
            height: 600px;
        }
    </style>
</head>

<body class="add_books">
        <div class="add_books" id="bookshelf">
            <h3 style="text-align: center; ">Edit Books Information</h3><br>
            <?php
				
				$sql = "SELECT * FROM `books` WHERE `bid`='$_SESSION[bid]'";
				$result = mysqli_query($db,$sql);

				while ($row = mysqli_fetch_assoc($result)) 
				{
					$bid=$row['bid'];
					$name=$row['name'];
					$authors=$row['authors'];
					$edition=$row['edition'];
					$quantity=$row['quantity'];
					$department=$row['department'];
                    $price=$row['price'];
                    $bookshelf=$row['book_shelf'];
                    $confined=$row['confined'];
				}
			?>

            <form action="" method="post">

            <div>	<h5>Book_Id: &nbsp;
                <?php echo $bid; ?></h5></div>
            <div>	<h5>Book_Name: &nbsp;
                <?php echo $name; ?></h5></div>
            <br>

            <label><h5>Author_Name</h5>
                <input class="form-control" type="text" name="authors" value="<?php echo $authors; ?>">
            </label>
 
            <label><h5>Edition</h5>
                <input class="form-control" type="text" name="edition" value="<?php echo $edition; ?>">
            </label>

            <label><h5>Quantity</h5>
                <input class="form-control" type="number" min="1" name="quantity" value="<?php echo $quantity; ?>">
            </label>

            <label><h5>Price </h5>
                <input class="form-control" type="number" name="price" value="<?php echo $price; ?>">
            </label>

            <label><h5>Category </h5>
                <input class="form-control" type="text" name="department" value="<?php echo $department; ?>">
            </label>

            <label><h5>Bookshelf</h5>
                <input class="form-control" type="text" name="bookshelf" value="<?php echo $bookshelf; ?>">
            </label><br><br>  

            <label><h5>Confined Copy</h5>
                <input class="form-control" type="text" name="confined" value="<?php echo $confined; ?>">
            </label><br><br> 

            <div style="padding-left: 100px;">
                <button style="font-weight: bold; background-color: orange;     margin-left: 12vh; width:80px;" class="btn btn-default" type="submit" name="submit">save</button><br><br>
            </div>
            </form>
        </div>
</body>


<?php 
if(isset($_POST['submit'])) {
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $quantity = $_POST['quantity'];
    $department = $_POST['department'];
    $confined = $_POST['confined'];
    $price = $_POST['price']; // Add this line to capture the updated price from the form

    $sql1 = "UPDATE `books` SET `authors`='$authors', `edition`='$edition', `quantity`='$quantity', `department`='$department', `price`='$price',`confined`='$confined',`book_shelf`='$bookshelf' WHERE `bid`='".$_SESSION['bid']."';";

    if(mysqli_query($db, $sql1)) {
        ?>
        <script type="text/javascript">
            window.confirm("Saved Successfully.");
            window.location="books.php";
        </script>
        <?php
    } 
}
?>
