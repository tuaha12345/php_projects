<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="../../assets/images/icon.png">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script>(function(w, d) { w.CollectId = "64f6ed7f8a3fde15c3ecd59e"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>

<body class="books">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="report_paper.php">Reports</a></div>
        <div class="h"><a href="payment_options.php">Payment</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="report_request.php">Report Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
        <div class="h"><a href="expired.php">Expired List</a></div>
        <div class="h"><a href="fine.php">Fine List</a></div>

    </div>
       

<div class="container">
    <!------------------ sideicon----------->
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
        <!------------------ end of sideicon----------->
       <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<h3 style="text-align: center; font-weight: bold;">List Of Projects,thesis,report paper</h3>

<!------------------------- search ----------------->
           <div style="float: left; padding-top: 20px;">
                <form class="navbar-form" method="post" name="form1" action="">
                    <input class="form-control" type="text" name="search" placeholder="search paper ..." required="">
                    <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>

             <div style="float: right;padding-top: 10px;">
                <form class="navbar-form" method="post" name="form1" action="">
                    <input class="form-control" type="text" name="id" placeholder="enter book id..." required="">
                    <button style="background-color: #61c6e4;" type="submit" name="submit1" class="btn btn-default">Request
                    </button>
                </form>
            </div>
            
<!---------------------end of ---- search ----------------->
    
    <?php
        if(isset($_POST['submit']))
        {
            // $q=mysqli_query($db,"SELECT * FROM `paper` WHERE `title` LIKE '%$_POST[search]%' ");
             $searchTerm = $_POST['search'];
    echo "Search Term: $searchTerm"; // Debugging line

    $q = mysqli_query($db, "SELECT * FROM `paper` WHERE `title` LIKE '%$searchTerm%'");
            if(mysqli_num_rows($q)==0)
            {
                echo "No book found.";
            }
            else
            {
                echo "<table class='table table-bordered table-hover' style='width:99%'>";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "ID"; echo "</th>";
                        echo "<th>"; echo "Category"; echo "</th>";
                        echo "<th>"; echo "Title"; echo "</th>";
                        echo "<th>"; echo "Submitted by"; echo "</th>";
                        echo "<th>"; echo "Supervised by"; echo "</th>";
                        echo "<th>"; echo "Submission year"; echo "</th>";
                        echo "<th>"; echo "Department"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Bookshelf"; echo "</th>";
                    echo "</tr>";
                echo "</table>";
                echo  "<div class='scroll_book'>";
                echo "<table class='table table-bordered'>";
                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['id']; echo "</td>";
                        echo "<td>"; echo $row['category']; echo "</td>";
                        echo "<td>"; echo $row['title']; echo "</td>";
                        echo "<td>"; echo $row['submitted_by']; echo "</td>";
                        echo "<td>"; echo $row['supervised_by']; echo "</td>";
                        echo "<td>"; echo $row['submission_year']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";

                    echo "<td style='text-align:center;font-weight: bold;'>";
                   echo "<a onclick='myFunction(\"{$row['book_shelf']}\")'>{$row['book_shelf']}</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
        }

        else
        {

            $res = mysqli_query($db, "SELECT * FROM `paper` ORDER BY `submission_year` DESC ");


            echo "<table class='table table-bordered table-hover' style='width:99%'>";
                echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "id"; echo "</th>";
                        echo "<th>"; echo "Category"; echo "</th>";
                        echo "<th>"; echo "Title"; echo "</th>";
                        echo "<th>"; echo "Submitted by"; echo "</th>";
                        echo "<th>"; echo "Supervised by"; echo "</th>";
                        echo "<th>"; echo "Submission year"; echo "</th>";
                        echo "<th>"; echo "Department"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Bookshelf"; echo "</th>";
                echo "</tr>";
            echo "</table>";
            echo  "<div class='scroll_book'>";
                echo "<table class='table table-bordered'>";
                while($row=mysqli_fetch_assoc($res))
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['id']; echo "</td>";
                        echo "<td>"; echo $row['category']; echo "</td>";
                        echo "<td>"; echo $row['title']; echo "</td>";
                        echo "<td>"; echo $row['submitted_by']; echo "</td>";
                        echo "<td>"; echo $row['supervised_by']; echo "</td>";
                        echo "<td>"; echo $row['submission_year']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";

                    echo "<td style='text-align:center;font-weight: bold;'>";
                   echo "<a onclick='myFunction(\"{$row['book_shelf']}\")'>{$row['book_shelf']}</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            echo "</table>";
        }
    ?>

<!------------------------- for paper request---------------->
<?php

        
if (isset($_POST['submit1'])) {
    $report_id = $_POST['id'];
    
    $sql = "SELECT * FROM `paper` WHERE id='$report_id'";
    $query = mysqli_query($db, $sql);
    $row1 = mysqli_fetch_assoc($query);
    $username=$_SESSION['login_user'];
    $report_name=$row1['title'];

    // check avaliable or not----------
    if (strcasecmp($row1['status'], "Available") === 0) {
        echo "Available";
        // echo $username;
        // check user have any due or not----------
        $sql2 = "SELECT * FROM `online_payment` WHERE username='$username'";
        $query2 = mysqli_query($db, $sql2);
        $row2 = mysqli_fetch_assoc($query2);   
        if (strcasecmp($row2['status'], "Clear") === 0) {
           // echo "Yes";
           $report_request="Pending";
           $report_return="No";
           // inserting data into report_tracking table
           $sql3 = "INSERT INTO report_tracking (username, report_id, report_name,report_request,report_return)  VALUES ('$username', $report_id, '$report_name','$report_request','$report_return')";
           $query3 = mysqli_query($db, $sql3);
           // $row3 = mysqli_fetch_assoc($query3); 
           if($query3)
           {
            echo "Request sent successfully";
             echo "<script type='text/javascript'>
            window.location='report_paper.php'
            </script>";
           }
        } 


        else{
             echo "<script type='text/javascript'>
             alert('Please Clear your due before...');
             </script>";
        }





    } 





    else {

    echo "<script type='text/javascript'>
         alert('This book is not available');
         </script>";


    }



}




?>












    </div>
    </div>





<script type="text/javascript">
function myFunction(a) {
  // Split the string into an array using the dot as a separator
  var parts = a.split('.');

  // Check if the array has three elements
  if (parts.length === 3) {
    // Extract almirah, row, and column values
    var bookshelf = parts[0];
    var row = parts[1];
    var column = parts[2];

    // Display the values in the alert
    alert("This book is available at :  \n Bookshelf: " + bookshelf + ", Row: " + row + ", Column: " + column);
  } else {
    // Handle the case where the input format is not as expected
    alert("Sorry, this book is not avaliable in bookshelf");
  }
}

</script> 


    
</body>


<br><br>
<?php include '../inc/footer.php'; ?>
