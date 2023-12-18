<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
    <title>Book Edit</title>
</head>

<body class="add_books">
    <div class="add_books">
        <h3 style="text-align: center; ">Edit Paper/Report Information</h3><br>

        <?php
        $id = $_GET['id'];

        $sql = "SELECT * FROM `paper` WHERE id=$id ";
        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $category = $row['category'];
            $submitted_by = $row['submitted_by'];
            $supervised_by = $row['supervised_by'];
            $department = $row['department'];
            $submission_year = $row['submission_year'];
            $bookshelf = $row['book_shelf'];
        }
        ?>

        <form class="paper" action="" method="post">
            <!-- You don't need to include the bid field here -->
            <input class="form-control" type="text" name="title" value="<?php echo $title ?>" required><br>
            <input class="form-control" type="text" name="student" value="<?php echo $submitted_by ?>" required><br>
            <input class="form-control" type="text" name="supervisor" value="<?php echo $supervised_by ?>" required><br>
            <input class="form-control" type="text" name="year" value="<?php echo $submission_year ?>" required><br>
            <input class="form-control" type="text" name="department" value="<?php echo $department ?>" required><br>
            <input class="form-control" type="text" name="category" value="<?php echo $category ?>" required><br>
            <input class="form-control" type="text" name="bookshelf" value="<?php echo $bookshelf ?>" required><br>
            <input class="btn btn-default" type="submit" name="submit" value="Update" style="color: black; height: 30px; width: 80px; background-color: lightgoldenrodyellow;">
        </form>
    </div>
</body>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $student = $_POST['student'];
    $supervisor = $_POST['supervisor'];
    $year = $_POST['year'];
    $category = $_POST['category'];
    $department = $_POST['department'];
    $bookshelf = $_POST['bookshelf']; // added this line to capture bookshelf value

    $sql1 = "UPDATE `paper` SET `title`='$title', `category`='$category', `submitted_by`='$student', `department`='$department', `supervised_by`='$supervisor',`submission_year`='$year',`book_shelf`='$bookshelf' WHERE `id`='$id';";

    if (mysqli_query($db, $sql1)) {
        ?>
        <script type="text/javascript">
            window.confirm("Saved Successfully.");
            window.location = "paper.php";
        </script>
<?php
    }
}
?>
