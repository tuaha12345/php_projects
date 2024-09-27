<?php


session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Araf's Moto Corp</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon" />

    <!-- CSS home -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/carDetails.css" />
    

    <!-- font style -->
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

    
      
<div class="car_main_div">

      <?php
        include 'connect.php';

        // Get car ID from URL or form submission
         $car_id = $_GET['car_id']; 
         

        // Fetch car details along with seller details
        $sql = "SELECT car_table.*, seller_table.name AS seller_name, seller_table.address AS seller_address, 
        seller_table.phone_number AS seller_phone, seller_table.email AS seller_email 
        FROM car_table 
        JOIN seller_table ON car_table.seller_id = seller_table.id 
        WHERE car_table.car_id = $car_id";

        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $car = mysqli_fetch_assoc($result);
            echo "<div class='car_card'>
                    <img src='{$car['image']}' alt='Car Image' class='car_img' width='100%' height='300px'>
                    <h2 style='text-align:center'>{$car['model']}({$car['make']})</h2>
                     <div class='car_info'>
                        <div class='div1'>
                            
                            <h3>Car Details</h3>
                            <p><strong>Year:</strong> {$car['year']}</p>
                            <p><strong>Mileage:</strong> {$car['mileage']} km</p>
                            <p><strong>Location:</strong> {$car['location']}</p>
                            <p><strong>Price:</strong> \${$car['price']}</p>
                         </div>
                         <div class='div2'>    
                            <h3>Seller Details</h3>
                            <p><strong>Name:</strong> {$car['seller_name']}</p>
                            <p><strong>Address:</strong> {$car['seller_address']}</p>
                            <p><strong>Phone:</strong> {$car['seller_phone']}</p>
                            <p><strong>Email:</strong> {$car['seller_email']}</p>
                         </div>   
                     </div>       
                  </div>";
        } else {
            echo "<p>No car details found.</p>";
        }

        // Close the connection
        mysqli_close($con);
        ?>


</div>



 
    <!---- footer--->
    <?php 
      include 'partials/footer.php';
    ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
