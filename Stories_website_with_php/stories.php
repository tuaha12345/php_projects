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

 <?php include 'partials/header.php' ?>

 <?php

$id=$_GET['story_id'];
$sql="SELECT * FROM topics WHERE topic_id=$id";
$re=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($re))
{
	$topic_name=$row['topic_name'];
	$topic_description=$row['topic_description'];
	$topic_image=$row['topic_image'];

}



 ?>

 <!--------------------- jumbotron--------->
 <div class=" container-fluid">
    <div class="p-5 mb-4 bg-warning rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?php echo $topic_name ?></h1>
        <p class="col-md-8 fs-4"><?php echo $topic_description ?></p>
        <a class="btn btn-dark btn-lg" type="button" href="#reading">Continue reading</a>
      </div>
    </div>
 </div>
<!---------------- carousel------------->

		<div id="carouselExampleIndicators" class="container-fluid carousel slider">
		  <div class="carousel-indicators ">
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



 <!--------------------- jumbotron--------->
 <div class=" container-fluid" id="reading">
    <div class="p-5 mb-4 bg-warning rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 text-center">Enjoy your reading</h1>
        <img src="images/img11.jpg" class="d-block w-100 container-fluid" alt="...">
        <p class="fs-5">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.Embarking on a journey through the pages of a book is akin to opening a portal to countless worlds, each offering a unique tapestry of emotions, adventures, and wisdom. "Enjoy your reading" is not just a simple wish; it's an invitation to traverse the landscapes of imagination, to walk alongside characters both familiar and unknown, and to explore ideas that may reshape perspectives. In the realm of a good book, time takes a pause, and the reader becomes a voyager, weaving through the threads of storytelling. So, as you delve into the written realms, may the words be your guide, the chapters be your milestones, and the joy of discovery be your constant companion. Enjoy your reading, for within the pages, you might just discover a piece of yourself or a world you've never known.</p>

      </div>
    </div>
 </div>

<!--------- thank you text--------->
<div class="container-fluid my-5"> 
	<h2 class="text-center display-5">Thank you for your time 😊</h2>
</div>
		

<?php  include 'partials/footer.php'   ?>

<!---------------- bootstrap js---------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>     
</body>
</html>