<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Rent Now</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="top_contact-container">
          <div class="tel_container">
            <a href="">
              <img src="images/telephone-symbol-button.png" alt=""> Call : +0151234567890
            </a>
          </div>
          <div class="social-container">
            <a href="">
              <img src="images/fb.png" alt="" class="s-1">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="" class="s-2">
            </a>
            <a href="">
              <img src="images/instagram.png" alt="" class="s-3">
            </a>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <img src="images/main_logot.png" alt="">
            <span>
              Rent Now
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About </a>
                </li>
                
               
                
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>
              </ul>
              
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="">
                  <img src="images/user.png" alt="">
                  <span>
                    <button type="button" id="log">Login</button>

                  </span>

                  <script type="text/javascript">
                    var log=document.getElementById('log');
                    log.onclick=function()
                    {
                      var email= prompt("Enter your email:");
                      var pass= prompt("Enter your password:");

                      if(email=="" || pass=="")
                      {
                        alert("Email & password can't be empty");
                      }
                      else{
                        alert("Thanks for stay with us");
                         window.location = 'index.php';
                      }

                    }

                  </script>







                </a>
              </div>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/page_view1.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                       Rent Now Webpage
                      </span>

                    </h1>
                    <p>
                      In our country people faces a lot of problem to rent or buy house,car,truck.But in this site we can easily find our as desired house,car and truck
                    </p>
                    <div>
                      <a href="">
                        Rent Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/page_view3.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                        Rent Now Webpage
                      </span>

                    </h1>
                    <p>
                      In our country people faces a lot of problem to rent or buy house,car,truck.But in this site we can easily find our as desired house,car and truck
                    </p>
                    <div>
                      <a href="">
                        Rent Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/page_view2.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                        Rent Now Webpage
                      </span>

                    </h1>
                    <p>
                      In our country people faces a lot of problem to rent or buy house,car,truck.But in this site we can easily find our as desired house,car and truck
                    </p>
                    <div>
                      <a href="">
                        Rent Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>


    </section>
    <!-- end slider section -->
  </div>

  <section class="feature_section  layout_padding">
    <div class="container">
      <div class="feature_container">
        <div class="box">
          <div class="img-box">
            <img src="images/menu1.png" height="60px" width="60px">
             
          </div>
          <div class="detail-box">
            <h5>
              Fast Rent
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/menu2.png" height="60px" width="60px">
          </div>
          <div class="detail-box">
            <h5>
              license of government
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
           <img src="images/menu3.png" height="60px" width="60px">

          </div>
          <div class="detail-box">
            <h5>
              support24/7
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end feature section -->

  <!-- discount section -->

  <section class="discount_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-5 offset-md-2">
          <div class="detail-box">
            <h2>
              You get <br>
              any house,car,or Truck<br>
              on
              <span>
                15% discount
              </span>

            </h2>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
            <div>
              <a href="">
                Rent Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-5">
          <div class="img-box">
            <img src="images/rentu.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end discount section -->

  <!--Rent Section -->

  <section class="health_section layout_padding">
    <div class="health_carousel-container">
      <h2 class="text-uppercase">
        
            House,room & hotel
      </h2>
      <div class="carousel-wrap layout_padding2">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house1.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    1000000
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house2.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-1" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      Tk
                    </span>
                    15000
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house3.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      Tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house4.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    13000
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house5.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    11000
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house6.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30500
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house7.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/house8.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="health_carousel-container">
      <h2 class="text-uppercase">
        Cars & trucks


      </h2>
      <div class="carousel-wrap layout_padding2">
        <div class="owl-carousel owl-2">
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/car1.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/car3.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    12300
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/truck2.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="contact.html">
                  Rent Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/truck1.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Rent 
                  </h6>
                  <h6 class="price">
                    <span>
                      tk
                    </span>
                    30000
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="">
        See more
      </a>
    </div>
  </section>

  <!-- end  -->

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
          About Us
        </h2>
      </div>

      <div class="img-box">
        <img src="images/about1.jpg" alt="">

      </div>
      <div class="detail-box">
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page when looking
          at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
          opposed to using 'Content here, content here', making it
        </p>
        <div class="d-flex justify-content-center">
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
          What is says our clients
        </h2>
      </div>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  Yes,It looks good ...Easily can rent as our desired house,hotel,room,car,truck.
                </p>
              </div>
              <div class="client_box ">
               
                </div>
                <div class="name">
                  <h5>
                    Muntasir
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in
                  some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="client_box ">
                <div class="img-box">
                  <img src="images/client.png " alt="">
                </div>
                <div class="name">
                  <h5>
                    Fahad
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in
                  some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="client_box ">
                <div class="img-box">
                  <img src="images/client.png " alt="">
                </div>
                <div class="name">
                  <h5>
                    Arnab
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="custom_heading-container ">
          <h2>
            Request A call back
          </h2>
        </div>
      </div>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="col-md-5">
          <div class="form_contaier">
            <form action="connect.php" method="post">
              <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputName1">
              </div>
              <div class="form-group">
                <label for="exampleInputNumber1">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputNumber1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group ">
                <label for="inputState">Select items</label>
                <select id="inputState" class="form-control">
                  <option selected>House</option>
                  <option selected>Hotel</option>
                  <option selected>Room</option>
                  <option selected>Truck</option>
                  <option selected>Car</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputMessage">Description about the choosen item</label>
                <input type="text" class="form-control" id="exampleInputMessage">
              </div>
              <button type="submit" class="">Confirm</button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <h3 style="color:dimgrey;font-weight: bold;font-family: cursive;">
              Rent Now
            </h3>
            <p style="color:dimgray;font-size: 20px;font-weight: bold;font-family: cursive;">
              In our country people faces a lot of problem to rent or buy house,car,truck.But in this site we can easily find our as desired house,car and truck.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->



  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2022 All Rights Reserved by
      <a href="https://html.design/">Rent now</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
  <script type="text/javascript">
    $(".owl-2").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,

      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
</body>

</html>