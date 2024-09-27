<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="shortcut icon" href="./assets/Araf's.png" type="image/x-icon" />

    <!-- CSS links -->
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/aboutUs.css" />

    <!-- Google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
  </head>
  
     <!------------- navbar--------------->
     <?php 
       include 'partials/navbar.php';

     ?>
     <div class="about">
<h1 class="about_header">About Us</h1>
     </div>
    <section class="container">
      <div>
        <h1>Who We Are</h1>
        <p>
          Welcome to Araf's Moto Corp, where our journey began in May 2017 with a firm determination to provide a welcoming atmosphere for car enthusiasts. As time passed, we expanded our services to cater not only to enthusiasts but also to the general public. Our growth and evolution have been ongoing, as we continually refine our approaches to ensure customer satisfaction remains our primary focus. Therefore, we remain dedicated to upholding our main goal of bringing smiles to our customers' faces.
        </p>
        <br />
        <p>
          Explore a new way of shopping for cars where everything from looking around to buying is made easy. Our easy-to-use system lets you check out lots of different vehicles. We are also give the same attention to the sellers who want to sell their cars. They can use our webpage to advertise their cars and get a good value for it.
        </p>
      </div>
      <img src="./assets/aboutUs.jpg" alt="about us image"  class="about_img" />
    </section>

    <section class="container">
      <img src="./assets/mission.JPG" alt="Our Mission image" class="about_img" />
      <div>
        <h1>Our Mission</h1>
        <p>
          Mission: Our goal is to give you the best car-selling and buying experience possible. We offer great cars and top-notch service to make sure you're happy every step of the way.</p>

         <p> Vision: We aim to change the way people buy cars by always improving and staying ahead of what our customers need. We want to be the place everyone thinks of when they want a smooth and enjoyable car-buying process.
        </p>
      </div>
    </section>

    <section class="contact_container">
      <h3>Contact Us</h3>

      <div class="contact">
        <div class="address">Address</div><br>
        <div class="address">Number</div><br>
        <div class="address">Email</div><br>
      </div>
    </section>
    <br><br>
    <section class="team_container">
      <h3>Our Representatives</h3>

      <div class="team">
        <div class="member">
          <img src="./assets/member1.jpg" alt="member Image" class="member_img" />
          <p>Jason Xing</p>
        </div>
        <div class="member">
          <img src="./assets/member2.jpg" alt="member Image"   class="member_img" />
          <p>Maria Thomson</p>
        </div>
        <div class="member">
          <img src="./assets/member3.jpg" alt="member Image" class="member_img" />
          <p>David Stark</p>
        </div>
        <div class="member">
          <img src="./assets/member4.jpg" alt="member Image" class="member_img" />
          <p>Emilia Kent</p>
        </div>
      </div>
    </section><br><br>

    <!---- footer--->
    <?php 
      include 'partials/footer.php';
    ?>

    <!-- JS links -->
    <script src="./scripts/app.js"></script>
  </body>
</html>
