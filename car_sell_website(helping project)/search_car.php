<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Car</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon">

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/search_car.css">

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <!------------- navbar--------------->
    <?php include 'partials/navbar.php'; ?>
    <h1 style="text-align:center;color:dimgray;font-weight:bold">Search Car Here...</h1>

    <div >
        <form action="search_car.php" method="POST" class="search_container">
            <input type="text" id="model" name="model" placeholder="Enter car model">
            <input type="text" id="location" name="location" placeholder="Enter location">
            <button type="submit">
                <!-- <img src="./assets/search.png" alt="icon"> -->
                Search
            </button>
        </form>
    </div>

    <div class="my_container">



        <?php
        include 'connect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Create a connection

            // Get the search parameters and escape special characters
            $model = mysqli_real_escape_string($con, $_POST['model']);
            $location = mysqli_real_escape_string($con, $_POST['location']);

            // Query the database for cars that match the search criteria
            $sql = "SELECT * FROM car_table 
                    WHERE model LIKE '%$model%' AND location LIKE '%$location%'";

            $result = mysqli_query($con, $sql);

            echo "<div class='search_card_main'>";
             $number_of_rows=mysqli_num_rows($result);
             
            if ($result && $number_of_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo " <a href='carDetails.php?car_id={$row['car_id']}'>
                          <div class='search_card_container'>
                            <img class='search_car_card_img' width='100%' height='170px'
                            src='{$row['image']}' alt='{$row['image']}'>
                              <div class='search_car_card_text'>
                                <h3 style='color:white'> {$row['model']}</h3>
                                <p>{$row['location']}</p>
                               
                              </div> 
                          </div> </a>";
                }
            } else {
                echo "<p id='noCarMessage'>No cars found.</p>";
            }
          
            echo "</div>";
            // Close the connection
            mysqli_close($con);
        }


        else{
                        // Query the database for all cars 
                        $sql = "SELECT * FROM car_table ";
    
                $result = mysqli_query($con, $sql);
    
                echo "<div class='search_card_main'>";
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo " <a href='carDetails.php?car_id={$row['car_id']}'>
                              <div class='search_card_container'>
                                <img class='search_car_card_img' width='100%' height='170px'
                                src='{$row['image']}' alt='{$row['image']}'>
                                  <div class='search_car_card_text'>
                                    <h3 style='color:white'> {$row['model']}</h3>
                                    <p> {$row['location']}</p>
                                   
                                  </div> 
                              </div> </a>";
                    } 
                
        }
        ?>
    </div>
<br><br><br><br>

    <!---- footer--->
    <?php 
          include 'partials/footer.php';
        ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
</body>
</html>
