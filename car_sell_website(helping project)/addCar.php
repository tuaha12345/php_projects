<?php
// // Include database configuration file
// include 'connect.php'; 

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Car</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/form.css" />

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
     <!------------- navbar--------------->
     <?php 
       include 'partials/navbar.php';

     ?>
<br><br>
    <div class="title">
      <h1 class="title_header">Add a new car</h1>
     </div>

    <section class="container">
      <img
        class="registration_image"
        src="./assets/add_new_car.png"
        alt="registration image"
      />
      <fieldset>
        <legend>Add Car</legend>
        <form action="addCar.php" method="POST" enctype="multipart/form-data">
                <label for="make">Make:</label>
                <input type="text" id="make" name="make" required>

                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>

                <label for="year">Year:</label>
                <input type="month" id="year" name="year" required>

                <label for="year">Car Image:</label>
                <input type="file" id="car_image" name="car_image" required>

                <label for="mileage">Mileage:</label>
                <input type="number" id="mileage" name="mileage" required>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>

                <button type="submit">Add Car</button>
            </form>
      </fieldset>
    </section><br><br><br><br>

    <!---- footer--->
    <?php 
      include 'partials/footer.php';
    ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>


<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $make = mysqli_real_escape_string($con, $_POST['make']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $mileage = mysqli_real_escape_string($con, $_POST['mileage']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $seller_id = $_SESSION['seller_id']; // Get the seller ID from the session

    // Handle file upload
    $uploaddir = 'car_images/';
    $uploadfile = $uploaddir . basename($_FILES['car_image']['name']);

    
    // else {
        if (move_uploaded_file($_FILES['car_image']['tmp_name'], $uploadfile)) {
            // Save the car details along with the image path to the database
            $sql = "INSERT INTO car_table (make, model, year, mileage, location, price,seller_id, image) VALUES ('$make', '$model', '$year', '$mileage', '$location', '$price','$seller_id', '$uploadfile')";
            if (mysqli_query($con, $sql)) {
                //echo "The file ". htmlspecialchars(basename($_FILES["car_image"]["name"])). " has been uploaded and car details saved.";
                echo "<script>alert('The file ". htmlspecialchars(basename($_FILES["car_image"]["name"])). " has been uploaded and car details saved'); window.location.href = 'addCar.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            //echo "Sorry, there was an error uploading your file.";
            echo "<script>alert('Sorry, there was an error uploading your file'); window.location.href = 'addCar.php';</script>";
        }
    // }

    // Close the connection
    mysqli_close($con);
}
?>
