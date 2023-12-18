<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
	<title>Fine Calculation </title>
</head>
<body class="books">

<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="add_books.php">Add Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
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
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
            }
        </script>

            <!--__________________________search bar________________________-->
        <div class="container">
            <div class="srch">
                <form class="navbar-form" method="post" name="form1">
                    
                        <input class="form-control" type="text" name="search" placeholder="Student username.." required="">
                        <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                </form>
            </div>

            <h2>Fine List</h2>
            <?php

                if(isset($_POST['submit']))
                {
                    $q=mysqli_query($db,"SELECT * FROM `fine` where username like '%$_POST[search]%' ");

                    if(mysqli_num_rows($q)==0)
                    {
                        echo "Sorry! No student found with that username. Try searching again.";
                    }

                    else
                    {
                        echo "<table class='table table-bordered table-hover'>";
                            echo "<tr style='background-color: #61c6e4;'>";
                                echo "<th>"; echo " Username ";	echo "</th>";
                                echo "<th>"; echo " Book-ID ";  echo "</th>";
                                echo "<th>"; echo " Returned Date";  echo "</th>";
                                echo "<th>"; echo " Days ";  echo "</th>";
                                echo "<th>"; echo " Fines in ৳ ";  echo "</th>";
                                echo "<th>"; echo " Status ";  echo "</th>";
                            echo "</tr>";	

                            while($row=mysqli_fetch_assoc($q))
                            {
                                echo "<tr>";
                                
                                echo "<td>"; echo $row['username']; echo "</td>";
                                echo "<td>"; echo $row['bid']; echo "</td>";
                                echo "<td>"; echo $row['returned_date']; echo "</td>";
                                echo "<td>"; echo $row['day']; echo "</td>";
                                echo "<td>"; echo $row['fine']; echo "</td>";
                                echo "<td>"; echo $row['status']; echo "</td>";

                                echo "</tr>";
                            }
                            echo "</table>";
                    }
                }
                        /*if button is not pressed.*/
                else
                {
                    $res=mysqli_query($db,"SELECT * FROM `fine`;");

                    echo "<table class='table table-bordered table-hover' style='width:99%;'>";
                        echo "<tr style='background-color: #61c6e4;'>";
                            echo "<th>"; echo " Username ";	echo "</th>";
                            echo "<th>"; echo " Bid ";  echo "</th>";
                            echo "<th>"; echo " Returned ";  echo "</th>";
                            echo "<th>"; echo " Days ";  echo "</th>";
                            echo "<th>"; echo " Fines in ৳ ";  echo "</th>";
                            echo "<th>"; echo " Status ";  echo "</th>";
                        echo "</tr>";	
                        echo "</table>";

                        echo "<div class='scroll_book'>";
                        echo "<table class='table table-bordered table-hover' >";
                    while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<tr>";
                            
                            echo "<td>"; echo $row['username']; echo "</td>";
                            echo "<td>"; echo $row['bid']; echo "</td>";
                            echo "<td>"; echo $row['returned_date']; echo "</td>";
                            echo "<td>"; echo $row['day']; echo "</td>";
                            echo "<td>"; echo $row['fine']; echo "</td>";
                            echo "<td>"; echo $row['status']; echo "</td>";

                            echo "</tr>";
                        }
                    echo "</table>";
                }

            ?>
    </div>
</body>
