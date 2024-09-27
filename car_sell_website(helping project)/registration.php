<?php
// Include database configuration file
  include 'connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
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
    <div class="title">
      <h1 class="title_header">Register Here</h1>
     </div>
    <section class="container">
      <img
        class="registration_image"
        src="./assets/register_now.png"
        alt="registration image"
      />
      <fieldset>
        <legend>Registration</legend>
        <form action="registration.php" method="POST">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required />

          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required />

          <label for="phone">Phone number:</label>
          <input type="number" id="phone" name="phone" required />

          <label for="email">Email address:</label>
          <input type="email" id="email" name="email" required />

          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />

          <button type="submit">Register</button>
        </form>

      </fieldset>
    </section>

    <!---- footer--->
    <?php 
      include 'partials/footer.php';
    ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>



<!----------------- php code to insert these data into database----------->
<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // sql query

    // check if the user already register or not
    $check_sql="SELECT  * FROM seller_table WHERE name='$name' AND phone_number='$phone_number' AND email='$email' AND username='$username' ";
    $run_this_check_query=mysqli_query($con,$check_sql);
    $num_rows=mysqli_num_rows($run_this_check_query);
    if($num_rows<1)
    {
        $sql = "INSERT INTO seller_table (name, address, phone_number, email, username, password) 
        VALUES ('$name', '$address', '$phone_number', '$email', '$username', '$password')";
        $run_query=mysqli_query($con,$sql);

        // Execute the statement
        if ($run_query) {
          echo "<script>alert('New record created successfully'); window.location.href = 'registration.php';</script>";
        } else {
          echo "<script>alert('Error: " . mysqli_error($con) . "'); window.location.href = 'registration.php';</script>";

        }
    }

    else{
        echo "<script>alert('User already registered')</script>";
    }


}
?>
