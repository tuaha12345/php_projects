<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
    <title>Books</title>
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
}

.custom-alert {
    display: none;
    padding: 15px;
    background-color: #f44336;
    color: white;
    border-radius: 10px;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.custom-alert .close-btn {
    cursor: pointer;
    float: right;
    font-size: 20px;
    font-weight: bold;
    color: white;
}

.custom-alert .close-btn:hover {
    color: black;
}

button {
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
}

    </style>
</head>

<body class="books">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="h"><a href="add_books.php">Add Books</a></div>
        <div class="h"><a href="books.php">Delete Books</a></div>
        <div class="h"><a href="request.php">Books Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
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
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">
            <div style="float: left; padding-top: 20px;">
                <form class="navbar-form" method="post" name="form1" action="">
                    <input class="form-control" type="text" name="search" placeholder="search books ..." required="">
                    <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>
            <div style="float: right;padding-top: 10px;">
                <form class="navbar-form" method="post" name="form1" action="">
                    <input class="form-control" type="text" name="bid" placeholder="enter book id ..." required="">
                    <button title="delete" style="background-color: #61c6e4;" type="submit" name="submit1" class="btn btn-default">
                        <span class="glyphicon glyphicon-trash" ></span>
                    </button>
                </form>
                <form class="navbar-form" method="post" name="form2" action="">
                    <input class="form-control" type="text" name="bid" placeholder="enter book_id. to edit" required="">
                    <button  title="edit" style="background-color: #61c6e4;" type="submit" name="submit2" class="btn btn-default">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                </form>
            </div>
            <h3 style="text-align: center; font-weight: bold;">List Of Books</h3>
            <?php
            if (isset($_POST['submit'])) {
                $q = mysqli_query($db, "SELECT * FROM `books` WHERE `name` LIKE '%$_POST[search]%' ");
                if (mysqli_num_rows($q) == 0) {
                    echo "No book found.";
                } else {
                    echo "<table class='table table-bordered' style='width:99%;' >";
                    echo "<tr style='background-color: #61c6e4;'>";
                    echo "<th>";
                    echo "Book_ID";
                    echo "</th>";
                    echo "<th>";
                    echo "Book_Name";
                    echo "</th>";
                    echo "<th>";
                    echo "Authors_Name";
                    echo "</th>";
                    echo "<th>";
                    echo "Edition";
                    echo "</th>";
                    echo "<th>";
                    echo "Status";
                    echo "</th>";
                    echo "<th>";
                    echo "Quantity";
                    echo "</th>";
                    echo "<th>";
                    echo "Category";
                    echo "</th>";
                    echo "<th>";
                    echo "Price";
                    echo "</th>";                    
                    echo "<th>";
                    echo "Bookshelf";
                    echo "</th>"; 
                    echo "<th>";
                    echo "Confined copy";
                    echo "</th>"; 


                    echo "</tr>";
                    echo "</table>";
                    echo "<div class='scroll'>";
                    echo "<table class='table table-bordered'style='width:100%;' >";
                    while ($row = mysqli_fetch_assoc($q)) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['bid'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['name'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['authors'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['edition'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['status'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['department'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['price'];
                        echo "</td>";

                    echo "<td style='text-align:center;font-weight: bold;'>";
                   echo "<a onclick='myFunction(\"{$row['book_shelf']}\")'>{$row['book_shelf']}</a>";
                    echo "</td>";

                    echo "<td>";
                    echo $row['confined'];
                    echo "</td>";

                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
            } else {

                $res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

                echo "<table class='table table-bordered table-hover' style='width:99%;'>";
                echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>";
                echo "Book_ID";
                echo "</th>";
                echo "<th>";
                echo "Book_Name";
                echo "</th>";
                echo "<th>";
                echo "Authors_Name";
                echo "</th>";
                echo "<th>";
                echo "Edition";
                echo "</th>";
                echo "<th>";
                echo "Status";
                echo "</th>";
                echo "<th>";
                echo "Quantity";
                echo "</th>";
                echo "<th>";
                echo "Category";
                echo "</th>";
                echo "<th>";
                echo "Price";
                echo "</th>";
                echo "<th>";
                echo "Bookshelf";
                echo "</th>"; 
                echo "<th>";
                echo "Confined copy";
                echo "</th>";                                
                echo "</tr>";
                echo "</table>";
                echo "<div class='scroll'>";
                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['bid'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['authors'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['edition'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['status'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['quantity'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['department'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['price'];
                    echo "</td>";
                    echo "<td style='text-align:center;font-weight: bold;'>";
                   echo "<a onclick='myFunction(\"{$row['book_shelf']}\")'>{$row['book_shelf']}</a>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['confined'];
                    echo "</td>";
                    echo "</tr>";


                }
                echo "</table>";
                echo "</div>";
            }

            if (isset($_POST['submit1'])) {
                $count = 0;
                $sql = "SELECT `bid` FROM `books`";
                $res = mysqli_query($db, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    if ($row['bid'] == $_POST['bid']) {
                        $count = $count + 1;
                    }
                }
                if ($count == 0) {
            ?>
                    <script type="text/javascript">
                        alert("Book id is not found!");
                    </script>
                <?php
                } else {
                    mysqli_query($db, "DELETE FROM `books` WHERE `bid`='$_POST[bid]'");
                ?>
                    <script type="text/javascript">
                        alert("Delete Successful.");
                    </script>
            <?php
                }
            }

            if(isset($_POST['submit2']))
            {
                $_SESSION['bid']=$_POST['bid'];
                ?>
                <script type="text/javascript">
                    window.location="book_edit.php"
                </script>
                <?php
            }

            ?>
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