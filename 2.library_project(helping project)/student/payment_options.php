<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>

<head>
    <title>Books</title>
    <style type="text/css">
    	.row{
    		width:1200px;
    		display: flex;
    		            align-items: center;
            justify-content: center;
/*    		background-color:dimgray;*/
    	}
    /*	.col-md-6{
    		width:500px;
    		background: transparent;
    		float:left;
            align-items: center;
            justify-content: center;
    		margin: 15px;	
    	}*/

    	.col-2
    	{
    		width:500px;
    		background: transparent;
    	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(175, 189, 179, 0.19);
         text-align: center;
         color: dimgray;
         padding: 10px;
         margin: 15px;
    		
    	}
    	.img{
          height: 150px;
          width: 150px;
          margin: 10px;
          border-radius: 5px;
          

          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(175, 189, 179, 0.19);
    	}
    	.p{
          padding:10px;
    	}
    </style>
</head>

<body class="books">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="payment_options.php">Payment</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
        <div class="h"><a href="fine.php">Fine List</a></div>

    </div>

    <div id="main">
        <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">

            <h2 style="text-align: center; font-weight: bold;" class="text-primary">Pay Online</h2>

            <div class="row" >
            	<div class="col-md-6 col-2">
            		<h2 style="font-weight: bold;">Payment Options </h2>
            		<a href="bkash.php"><img src="images/bkash.png" class="img p"></a>
            		<a href="rocket.php"><img src="images/rocket.png" class="img"></a>
            		<a href="nagad.php"><img src="images/nagad.png" class="img p"></a>
            	</div>
            	
            </div>

        </div>
    </div>
</body>
<?php include '../inc/footer.php'; ?>

</html>