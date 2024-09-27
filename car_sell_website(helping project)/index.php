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

    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
  </head>
  <body >
     <!------------- navbar--------------->
     <?php 
       include 'partials/navbar.php';

     ?>



    <section class="container">
      <h1>=> Welcome to Araf's Moto Corp <=</h1>
      <p class="message">
      We are a small corporation with a great vision. We're not just about selling cars; we're about making dreams come true. Whether you're seeking the sleek lines of a luxury sedan, the rugged capability of an SUV, or the nimble agility of a compact car, we have something for every taste and need.
      </p>
<img src="./assets/araf_motor.png" alt="car image" class="car_image" height="60%" />
    </section>

    <section class="container home_container">
      <div>
        <h1>How we make a difference <img src="./assets/home_more.png" alt="home image" height="50px" width="70px" /></h1>
        <div class="details_container">
          <div class="details">
            <h3>Diverse Selection</h3>
            <p>
              We are not limited to just a certain range. We offer you a wide range of variety upon your desire from compact car to rugged SUV and from fancy sedans to family-friendly minivans. Our job is to make sure everybody gets a solution according to their need.
            </p>
          </div><br><br>
          <div class="details">
            <h3>Transparent Transactions</h3>
            <p>
              Honesty and security are the main factors which help a corporation to grow. We make sure to be open and truthful in every deal we make. We have a small team of cyber security to ensure your safety in online.
            </p>
          </div><br><br>
          <div class="details">
            <h3>User-Centric Experience</h3>
            <p>
             We believe that there are no limits of excellence.Therefore, we are continuously working on making your everyday easy. Both online and offline platform are created to enhance your experience.
            </p>
          </div><br><br>
          <div class="details">
            <h3>Warranty Services</h3>
            <p>
              Not only we focus on making your buying experience better but also we focus on the after sales service as well. We offer you 3 packages of warranty services which will reduce your cost as well as your pressure.
            </p>
          </div>
        </div>
      </div>
      
    </section>

    <!---- footer--->
    <?php 
      include 'partials/footer.php';
    ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
