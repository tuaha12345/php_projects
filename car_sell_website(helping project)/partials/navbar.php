


    <div class="new_nav">

     <div class="nav_1">
     <a href="index.php" class="active">Home</a><br><br>
     <a href="aboutUs.php">About Us</a><br><br>

     <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
          <a href="addCar.php">Add Car</a><br><br>
          <a href="search_car.php">Search Car</a><br><br>
          <a href="logout.php">Logout</a><br><br>
        <?php else: ?>
          <a href="search_car.php">Search Car</a><br><br>
           <a href="registration.php">Registration</a><br><br>
           <a href="login.php">Login</a><br><br>
        <?php endif; ?>

     </div>

     <div class="nav_2">
     <!-- <img src="./assets/araf_motor.png" alt="Logo" height="150px" /> -->
     <h1>Araf's Moto Corp <hr><hr></h1>
     </div>

    </div>