<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Approve Request</title>
</head>
<body class="books">	
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="h"> <a href="books.php">Books</a></div>
		<div class="h"> <a href="add_books.php">Add Books</a></div>
		<div class="h"> <a href="request.php">Book Request</a></div>
		<div class="h"> <a href="issue_info">Issue Information</a></div>
    <div class="h"> <a href="expired.php">Expired List</a></div>
    <div class="h"> <a href="fine.php">Fine List</a></div>
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
			document.getElementById("main").style.marginLeft= "0";
			document.body.style.backgroundColor = "white";
			}
		</script>
        <div class="approve">
            <h2 style="text-align: center; font-size: 30px; font-weight: bold; font-family: Lucida Console;">Approve Books Request</h2><br>
            <form class="book" action="" method="post">
                <input class="form-control" type="text" name="approve" placeholder="Yes or No ..." required=""><br>
                <input class="form-control" type="text" name="issue_date" placeholder="Issue Date yyyy-mm-dd" required=""><br>
                <input class="form-control" type="text" name="return_date" placeholder="Return Date yyyy-mm-dd" required=""><br>
                <input class="btn btn-default" type="submit" name="submit" value="Ok" style="color: black; height: 30px; width: 50px; font-weight: bold;">
            </form>
        </div>
    </div>
    <?php
  if(isset($_POST['submit']))
  { 
 
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue_date` =  '$_POST[issue_date]', `return_date` =  '$_POST[return_date]' WHERE `username`='$_SESSION[name]' and `bid`='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE `books` SET `quantity` = `quantity`-1 where `bid`='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT `quantity` from `books` where `bid`='$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE `books` SET `status`='not-available' where `bid`='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }    ?>



<!---------- for remainder----------->
<?php


  if(isset($_POST['submit']))
  { 

    // to collect the email using username
    
    $username = $_SESSION['name'] ;
    $sql = "SELECT email FROM student WHERE username = '$username'";
    $result = mysqli_query($db, $sql);
    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];


  // Inserting the value into remainder table

    $requestDate = date("Y-m-d"); // Current date

    $sqlInsert = "INSERT INTO remainder (username, request_date, return_date, approve, email) VALUES ('$username', '$requestDate', '$_POST[return_date]', '$_POST[approve]', '$email')";
        // Perform the insertion query
        $result=mysqli_query($db, $sqlInsert);


  }

?>





</body>
