<?php include 'partials/connect.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!------------------ bootstrap css----------------------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!---------------------- font-awesome------------------->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!------------------- style css----------------------->
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
		.featureTitle{
		   font-family: 'Dancing Script',cursive;
		   font-size: 70px;
		}
	</style>

	<title>Storeis Website</title>
</head>
<body>
       
     <div class="container-fluid slider">
     	<?php include 'partials/header.php' ?>
		<div id="carouselExampleIndicators" class="carousel slide">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  </div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="images/img11.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="images/img10.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="images/img3.jpg" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>

      </div>



		
     	<div class="container">
			<h1 class="text-center featureTitle mb-5 fw-bold">Featured Stories</h1>
			<div class="row">

				<!----------- cart------------------>
		<?php
		$sql = "SELECT * FROM `topics`";
		$result = mysqli_query($con, $sql);

		if ($result) {
		    while ($row = mysqli_fetch_assoc($result)) {
		        $id=$row['topic_id'];
		        $topic_image=$row['topic_image'];
		        $topic_name=$row['topic_name'];
		        $topic_description=$row['topic_description'];
					echo " <div class='col-md-4 col-sm-6 mb-5'> 
							<div class='card' style='width: 18rem;'>
							  <img src=$topic_image class='card-img-top' alt=''>
							  <div class='card-body'>
							    <h5 class='card-title'>$topic_name</h5>
							    <p class='card-text'>".substr($topic_description,0,150)."........</p>
							    <a href='stories.php?story_id=$id' class='btn btn-primary'>Continue Reading</a>
							  </div>
							</div>
					   </div> " ;
		    }
		}
		?>	   
			   	

		    </div>
		</div>    

		

     	<?php  include 'partials/footer.php'   ?>

<!---------------- bootstrap js---------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>     
</body>
</html>