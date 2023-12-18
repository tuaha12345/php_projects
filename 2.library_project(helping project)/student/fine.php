<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fine Calculation </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="books">

<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
    </div>

    <div id="main">
    
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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

        <div class="container">

            <h2>Fine List</h2>
            <?php

            $res=mysqli_query($db,"SELECT * FROM `fine` where `username`='$_SESSION[login_user]' ;");

                echo "<table class='table table-bordered table-hover' >";
                    echo "<tr style='background-color: #61c6e4;'>";
                        //Table header
                        echo "<th>"; echo " Bid ";  echo "</th>";
                        echo "<th>"; echo " Returned Date";  echo "</th>";
                        echo "<th>"; echo " Days ";  echo "</th>";
                        echo "<th>"; echo " Fines in ৳ ";  echo "</th>";
                        echo "<th>"; echo " Status ";  echo "</th>";
                    echo "</tr>";	

                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                        
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['returned_date']; echo "</td>";
                        echo "<td>"; echo $row['day']; echo "</td>";
                        echo "<td>"; echo $row['fine']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";

                        echo "</tr>";
                    }
                echo "</table>";
                

            ?>
    </div>
</body>
</html>
