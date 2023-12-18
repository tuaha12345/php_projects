
<?php
// Include the database connection file
include '../inc/connect.php';
include 'admin_navbar.php';



// Initialize variables
$name = $authors = $edition = $status = $quantity = $department = $price=$bookshelf= '';
$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $student = $_POST['student'];
    $supervisor = $_POST['supervisor'];
    $year = $_POST['year'];
    $category = $_POST['category'];
    $department = $_POST['department'];
    $bookshelf = $_POST['bookshelf'];
    $status='Avaliable';


   $insertQuery = "INSERT INTO paper (`category`, `title`, `submitted_by`, `supervised_by`, `submission_year`, `department`, `status`,`book_shelf`) 
                VALUES ('$category', '$title', '$student', '$supervisor', '$year', '$department', '$status','$bookshelf')";


     $result = mysqli_query($db, $insertQuery);



    if ($result) {
        $successMessage = "Paper added successfully!";
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
    <title>Report,thesis,project paper</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
        #add_books{
            height:700px;
        }
        
    </style>
</head>
<body class="add_books">
    <div class="add_books" id="add_books">
        <h2 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Add New Paper</h2>
        <?php
        if (!empty($successMessage)) {
            echo '<div style="color: green; text-align: center;">' . $successMessage . '</div>';
        }

        if (!empty($errorMessage)) {
            echo '<div style="color: red; text-align: center;">' . $errorMessage . '</div>';
        }
        ?>
        <form class="paper" action="" method="post">
            <!-- You don't need to include the bid field here -->
            <input class="form-control" type="text" name="title" placeholder="Project/thesis/report title" required ><br>

            <input class="form-control" type="text" name="student" placeholder="Students name" required ><br>

           <input class="form-control" type="text" name="supervisor" placeholder="Supervisor name" required ><br>

            <input class="form-control" type="text" name="year" placeholder="Submission year" required ><br>


            <input class="form-control" type="text" name="department" placeholder="Department" required ><br>

            <select class="form-control" aria-label="Default select example" name="category">
                  <option selected>Select category</option>
                  <option value="Project">Project</option>
                  <option value="Thesis">Thesis</option>
                  <option value="Internship">Internship</option>
            </select><br>
            <input class="form-control" type="text" name="bookshelf" placeholder="Bookshelf" required value="<?php echo $bookshelf; ?>"><br>

            <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; height: 30px; width: 80px; background-color:lightgoldenrodyellow;">
        </form>
    </div>
</body>
</html>
