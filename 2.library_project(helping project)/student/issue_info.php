<?php
include '../inc/connect.php';
include 'student_navbar.php';
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
        <div class="books">
            <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
            <?php
            $c=0;

              if(isset($_SESSION['login_user']))
              {
                $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue_date,issue_book.return_date FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.username ='$_SESSION[login_user]' and issue_book.approve !='' ORDER BY `issue_book`.`issue_date` DESC";
                $res=mysqli_query($db,$sql);
                
                
                echo "<table class='table table-bordered' style='width:100%;' >";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "Book-ID";  echo "</th>";
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
                    echo "<tr>";
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
            ?>
        </div>
  </div>
</body>
</html>