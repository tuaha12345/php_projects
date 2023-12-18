<?php
// Include the database connection file
include '../inc/connect.php';
include 'admin_navbar.php';


// Initialize variables
$b_name = $auth_name = $edition = $isbn = $publisher =  '';
$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $b_name = $_POST['b_name'];
    $auth_name = $_POST['auth_name'];
    $edition = $_POST['edition'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];

    // Insert data into the info_books table (excluding the bid, as it's auto-increment)
    $insertQuery = "INSERT INTO `info_books` (`b_name`, `auth_name`, `edition`, `isbn`,  `publisher`) VALUES (?, ?, ?, ?,  ?)";
    $stmt = mysqli_prepare($db, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssssis", $b_name, $auth_name, $edition, $isbn, $publisher);

    if (mysqli_stmt_execute($stmt)) {
        $successMessage = "new info about books added successfully!";
    } else {
        $errorMessage = "Error adding book release info: " . mysqli_error($db);
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add new info of Books</title>
</head>
<body class="add_books">
    <div class="add_books">
        <h2 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Add New Books Release</h2>
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
            <input class="form-control" type="text" name="b_name" placeholder="Book Name" required value="<?php echo $b_name; ?>"><br>
            <input class="form-control" type="text" name="auth_name" placeholder="Authors Name" required value="<?php echo $auth_name; ?>"><br>
            <input class="form-control" type="text" name="edition" placeholder="Edition" required value="<?php echo $edition; ?>"><br>
            <input class="form-control" type="text" name="isbn" placeholder="ISBN" required value="<?php echo $isbn; ?>"><br>
            <input class="form-control" type="text" name="publisher" placeholder="Publisher" required value="<?php echo $publisher; ?>"><br>
            <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; height: 30px; width: 80px;">
            <input class="btn btn-default" type="reset" style="color: black; height: 30px; width: 80px;">
        </form>
    </div>
</body>
</html>
