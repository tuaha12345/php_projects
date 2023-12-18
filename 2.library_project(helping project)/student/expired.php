<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="books">
	
	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"> <a href="books.php">Books</a></div>
        <div class="h"> <a href="request.php">Book Request</a></div>
        <div class="h"> <a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
        <div class="h"><a href="fine.php">Fine List</a></div>
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
            
            <?php
            if(isset($_SESSION['login_user']))
            {
                ?>

            <div style="float: left; padding-left:  5px; padding-top: 20px;">
                <form method="post" action="">
                    <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                                &nbsp&nbsp
                    <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
                </form>
            </div>
            <div style="float: right;padding-top: 10px;">
                
                <?php 
                $var=0;
                $result=mysqli_query($db,"SELECT * FROM `fine` where `username`='$_SESSION[login_user]' and `status`='not paid' ;");
                while($r=mysqli_fetch_assoc($result))
                {
                    //$var=$var+$r['fine'];
					$var = $var + (int)$r['fine'];
                }
                $var2=$var+$_SESSION['fine'];

                ?>
                <!--<h3>Your fine is: 
                <?php
                    echo "৳ ".$var2;
                ?>
                </h3>-->
            </div>
        <br><br><br><br>
                <?php
            }

            
                $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
                $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                
                if(isset($_POST['submit2']))
                {
                
                $sql="SELECT
                        `student`.`username`,
                        `roll`,
                        `books`.`bid`,
                        `name`,
                        `authors`,
                        `edition`,
                        `issue_book`.`return_date`,
                        `approve`,
                        `issue_date`
                    FROM
                        `student`
                    INNER JOIN `issue_book` ON `student`.`username` = `issue_book`.`username`
                    INNER JOIN `books` ON `issue_book`.`bid` = `books`.`bid`
                    WHERE
                        `issue_book`.`approve` = '$ret' AND `issue_book`.`username` = '$_SESSION[login_user]'
                    ORDER BY
                        `issue_book`.`return_date` DESC";
                
                $res=mysqli_query($db,$sql);
                }
                
                else if(isset($_POST['submit3']))
                {
                $sql="SELECT
                        `student`.`username`,
                        `roll`,
                        `books`.`bid`,
                        `name`,
                        `authors`,
                        `edition`,
                        `issue_book`.`return_date`,
                        `approve`,
                        `issue_date`
                    FROM
                        `student`
                    INNER JOIN `issue_book` ON `student`.`username` = `issue_book`.`username`
                    INNER JOIN `books` ON `issue_book`.`bid` = `books`.`bid`
                    WHERE
                        `issue_book`.`approve` = '$exp' AND `issue_book`.`username` = '$_SESSION[login_user]'
                    ORDER BY
                        `issue_book`.`return_date` DESC"; 

                    $res=mysqli_query($db,$sql);
                }

                else
                {
                $sql="SELECT
                        `student`.`username`,
                        `roll`,
                        `books`.`bid`,
                        `name`,
                        `authors`,
                        `edition`,
                        `issue_book`.`return_date`,
                        `approve`,
                        `issue_date`
                    FROM
                        `student`
                    INNER JOIN `issue_book` ON `student`.`username` = `issue_book`.`username`
                    INNER JOIN `books` ON `issue_book`.`bid` = `books`.`bid`
                    WHERE
                        `issue_book`.`approve` != '' AND `issue_book`.`approve` != 'Yes' AND `issue_book`.`username` = '$_SESSION[login_user]'
                    ORDER BY
                        `issue_book`.`return_date` DESC";
                $res=mysqli_query($db,$sql);
                }

                echo "<table class='table table-bordered' style='width:99%;' >";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "Book-ID";  echo "</th>";
                        echo "<th>"; echo "Book Name";  echo "</th>";
                        echo "<th>"; echo "Authors Name";  echo "</th>";
                        echo "<th>"; echo "Edition";  echo "</th>";
                        echo "<th>"; echo "Status";  echo "</th>";
                        echo "<th>"; echo "Issue Date";  echo "</th>";
                        echo "<th>"; echo "Return Date";  echo "</th>";

                    echo "</tr>"; 
                echo "</table>";

                echo "<div class='scroll'>";
                    echo "<table class='table table-bordered'style='width:100%;' >";
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['bid']; echo "</td>";
                            echo "<td>"; echo $row['name']; echo "</td>";
                            echo "<td>"; echo $row['authors']; echo "</td>";
                            echo "<td>"; echo $row['edition']; echo "</td>";
                            echo "<td>"; echo $row['approve']; echo "</td>";
                            echo "<td>"; echo $row['issue_date']; echo "</td>";
                            echo "<td>"; echo $row['return_date']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                echo "</div>";

            ?>
        </div>
    </div>
</body>
</html>