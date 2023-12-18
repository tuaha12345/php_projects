<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
	<title>Book Request</title>
</head>
<body class="books">
	
	<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="h"> <a href="books.php">Books</a></div>
    <div class="h"> <a href="request.php">Book Request</a></div>
    <div class="h"> <a href="issue_info.php">Issue Information</a></div>
    <div class="h"><a href="expired.php">Expired List</a></div>
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
    
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>

      <div style="float: left; padding: 25px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
      </div>

          <div class="srch" >
          <form class="navbar-form" method="post" action="" name="form1">
            Return Approve:<br>
            <input type="text" name="username" class="form-control" placeholder="Username" required="">
            <input type="text" name="bid" class="form-control" placeholder="BID" required="">
            <button class="btn btn-default" style="background-color: #61c6e4;" name="submit" type="submit">Submit</button><br>
          </form>
        </div>
        <?php

        if(isset($_POST['submit']))
        {
            $day = 0;
			$fine = 0;
            $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
            
            while($row=mysqli_fetch_assoc($res))
            {
                $d= strtotime($row['return_date']);
                $c= strtotime(date("Y-m-d"));
                $diff= $c-$d;

                if($diff>=0)
                {
                $day= floor($diff/(60*60*24)); //for one book
                $fine= $day*5;
                }
            }
            $x= date("Y-m-d"); 
            //mysqli_query($db,"INSERT INTO `fine` VALUES ('$fine_id','$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");
              mysqli_query($db, "INSERT INTO `fine` (`username`, `bid`, `returned_date`, `day`, `fine`, `status`) VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine', 'not paid')");


            $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
            mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

            mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
          
        }
    }
    
    $c=0;
     
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
                `issue_book`.`approve` = '$ret'
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
                `issue_book`.`approve` = '$exp'
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
                `issue_book`.`approve` = 'Yes' OR `issue_book`.`approve` = '$exp'
            ORDER BY
                `issue_book`.`return_date` DESC";
        $res=mysqli_query($db,$sql);
    }

        echo "<table class='table table-bordered' style='width:99%;' >";
        
            echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "Roll No";  echo "</th>";
                echo "<th>"; echo "BID";  echo "</th>";
                echo "<th>"; echo "Book Name";  echo "</th>";
                echo "<th>"; echo "Authors Name";  echo "</th>";
                echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
                echo "<th>"; echo "Issue Date";  echo "</th>";
                echo "<th>"; echo "Return Date";  echo "</th>";

            echo "</tr>"; 
        echo "</table>";

    echo "<div class='scroll'>";
    echo "<table class='table table-bordered' style='width:100%;'>";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
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
