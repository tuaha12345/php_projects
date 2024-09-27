<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Car</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/searchCar.css" />

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

    <div class="search_container">
      <input type="text" id="model" placeholder="Enter car model" />

      <input type="text" id="location" placeholder="Enter location" />

      <button onclick="searchCars()">
        <img src="./assets/search.png" alt="icon" />
      </button>
    </div>

    <div class="card_container">
      <p id="noCarMessage"></p>
      <div id="carList"></div>
    </div>

    
        <!---- footer--->
        <?php 
          include 'partials/footer.php';
        ?>
        
    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
