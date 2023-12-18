<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issue Info.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="books">	
	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <div class="h"> <a href="books.php">Books</a></div>
        <div class="h"> <a href="request.php">Book Request</a></div>
        <div class="h"> <a href="issue_info.php">Issue Information</a></div>
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
    <div class="container">
    <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;

        if(isset($_SESSION['login_user']))
        {
            $sql="SELECT
                      `student`.`username`,`roll`,  
                      `books`.`bid`,
                      `name`,
                      `authors`,
                      `edition`,
                      `issue_book`.`issue_date`,
                      `return_date`
                  FROM
                      `student`
                  INNER JOIN `issue_book` ON `student`.`username` = `issue_book`.`username`
                  INNER JOIN `books` ON `issue_book`.`bid` = `books`.`bid`
                  WHERE
                      `issue_book`.`approve` = 'Yes'
                  ORDER BY
                      `issue_book`.`return_date` ASC;";
            $res=mysqli_query($db,$sql);
        
        
        echo "<table class='table table-bordered' style='width:99%;' >";
        
            echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "Roll No";  echo "</th>";
                echo "<th>"; echo "BID";  echo "</th>";
                echo "<th>"; echo "Book Name";  echo "</th>";
                echo "<th>"; echo "Authors Name";  echo "</th>";
                echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "Issue Date";  echo "</th>";
                echo "<th>"; echo "Return Date";  echo "</th>";
            echo "</tr>"; 
        echo "</table>";

    echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
        while($row=mysqli_fetch_assoc($res))
        {
            $d=date("Y-m-d");
            if($d > $row['return_date'])
            {
                $c=$c+1;
                $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

                mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return_date`='$row[return_date]' and approve='Yes' limit $c;");
                
                // echo $d."</br>";
            }

            echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['roll']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['issue_date']; echo "</td>";
                echo "<td>"; echo $row['return_date']; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    echo "</div>";
        
        }
        else
        {
            ?>
            <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>