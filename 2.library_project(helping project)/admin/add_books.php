<?php
// Include the database connection file
include '../inc/connect.php';
include 'admin_navbar.php';


// Initialize variables
$name = $authors = $edition = $status = $quantity = $department = $price=$confined= $bookshelf='';
$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $department = $_POST['department'];
    $price = $_POST['price'];
    $bookshelf = $_POST['bookshelf'];
    $confined = $_POST['confined'];


     $insertQuery = "INSERT INTO books (`name`, `authors`, `edition`, `status`, `quantity`, `department`, `price`,`book_shelf`,`confined`) 
                VALUES ('$name', '$authors', '$edition', '$status', $quantity, '$department', $price, '$bookshelf','$confined')";
     $result = mysqli_query($db, $insertQuery);



    if ($result) {
        $successMessage = "Book added successfully!";
    } else {
        $errorMessage = "Error adding book: " . mysqli_error($db);
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Books</title>
    <style>
        #add_books{
            height:700px;
        }
        
    </style>
</head>
<body class="add_books">
    <div class="add_books" id="add_books">
        <h2 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Add New Books</h2>
        <?php
        if (!empty($successMessage)) {
            echo '<div style="color: green; text-align: center;">' . $successMessage . '</div>';
        }

        if (!empty($errorMessage)) {
            echo '<div style="color: red; text-align: center;">' . $errorMessage . '</div>';
        }
        ?>
        <form class="book" action="" method="post">
            <!-- You don't need to include the bid field here -->
            <input class="form-control" type="text" name="name" placeholder="Book Name" required value="<?php echo $name; ?>"><br>
            <input class="form-control" type="text" name="authors" placeholder="Authors Name" required value="<?php echo $authors; ?>"><br>
            <input class="form-control" type="text" name="edition" placeholder="Edition" required value="<?php echo $edition; ?>"><br>
            <input class="form-control" type="text" name="status" placeholder="Status" required value="<?php echo $status; ?>"><br>
            <input class="form-control" type="number" min="1" name="quantity" placeholder="Quantity" required value="<?php echo $quantity; ?>"><br>
            <input class="form-control" type="text" name="department" placeholder="Department" required value="<?php echo $department; ?>"><br>
            <input class="form-control" type="text" name="price" placeholder="Book Price" required value="<?php echo $price; ?>"><br>
            <input class="form-control" type="text" name="bookshelf" placeholder="Bookshelf" required value="<?php echo $bookshelf; ?>"><br>
            <input class="form-control" type="text" name="confined" placeholder="Confined copy" required value="<?php echo $confined; ?>"><br>

            <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; height: 30px; width: 80px;">
            <input class="btn btn-default" type="reset" style="color: black; height: 30px; width: 80px;">
        </form>
    </div>
</body>
</html>
