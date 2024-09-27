
<?php

// Include database configuration file
include 'connect.php'; 

session_start(); // Start the session

// Initialize error message
$error_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and escape special characters
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];

    // Check if the username exists
    $sql = "SELECT * FROM seller_table WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['seller_id'] = $row['id']; 

            // Redirect to a protected page
            header("Location: index.php"); 
            exit;
        } else {
            $error_msg = "Invalid password.";
        }
    } else {
        $error_msg = "No user found with that username.";
    }

    // Close the connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon">

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/form.css">

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <!------------- navbar--------------->
    <?php include 'partials/navbar.php'; ?>
    <div class="title">
      <h1 class="title_header">Login</h1>
     </div>
    <section class="container">
        <fieldset>
            <legend>Login</legend>
            <?php
            if (!empty($error_msg)) {
                echo "<div class='error' style='color:red;'>$error_msg</div><br>";
            }
            ?>
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </fieldset>
        <img class="registration_image" src="./assets/new_login.png" alt="login image" height="250px" style="border:none;">
    </section>

    <!---- footer--->
    <?php include 'partials/footer.php'; ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
</body>
</html>


