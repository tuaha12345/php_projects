<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
    <title> Books Purchaising and Donating Information</title>
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
               <!-- <form class="navbar-form" method="post" name="form2" action="">
                    <input class="form-control" type="text" name="bid" placeholder="enter book_id. to edit" required="">
                    <button  title="edit" style="background-color: #61c6e4;" type="submit" name="submit2" class="btn btn-default">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                </form>-->
            </div>
            <h3 style="text-align: center; font-weight: bold;">Information Of Books Purchased or Donated</h3>
            <?php
            if (isset($_POST['submit'])) {
                $q = mysqli_query($db, "SELECT * FROM `purch_donate` WHERE `title` LIKE '%$_POST[search]%' ");
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
                    echo "Edition";
                    echo "</th>";
                    echo "<th>";
                    echo "Date";
                    echo "</th>";
					echo "<th>";
                    echo "Source";
                    echo "</th>";
					echo "<th>";
                    echo "Quantity";
                    echo "</th>";
					echo "<th>";
                    echo "Unit_Price in tk";
                    echo "</th>";
					echo "<th>";
                    echo "Total_Price in tk";
                    echo "</th>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<div class='scroll'>";
                    echo "<table class='table table-bordered'style='width:100%;' >";
                    while ($row = mysqli_fetch_assoc($q)) {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['pd_id'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['title'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['edition'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['date'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['source'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo "</td>";
						echo "<td>";
                        echo $row['unit_price'];
                        echo "</td>";
						echo "<td>";
                        echo $row['total'];
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
            } else {

                $res = mysqli_query($db, "SELECT * FROM `purch_donate` ORDER BY `purch_donate`.`title` ASC;");

                echo "<table class='table table-bordered table-hover' style='width:99%;'>";
                echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>";
                    echo "Book_ID";
                    echo "</th>";
                    echo "<th>";
                    echo "Book_Name";
                    echo "</th>";
                    echo "<th>";
                    echo "Edition";
                    echo "</th>";
                    echo "<th>";
                    echo "Date";
                    echo "</th>";
					echo "<th>";
                    echo "Source";
                    echo "</th>";
					echo "<th>";
                    echo "Quantity";
                    echo "</th>";
					echo "<th>";
                    echo "Unit_Price in tk";
                    echo "</th>";
					echo "<th>";
                    echo "Total_Price in tk";
                    echo "</th>";
                    echo "</tr>";
                echo "</table>";
                echo "<div class='scroll'>";
                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                       echo "<td>";
                        echo $row['pd_id'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['title'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['edition'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['date'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['source'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo "</td>";
						echo "<td>";
                        echo $row['unit_price'];
                        echo "</td>";
						echo "<td>";
                        echo $row['total'];
                        echo "</td>";
                        echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }

            if (isset($_POST['submit1'])) {
                $count = 0;
                $sql = "SELECT `pd_id` FROM `purch_donate`";
                $res = mysqli_query($db, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    if ($row['pd_id'] == $_POST['pd_id']) {
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
                    mysqli_query($db, "DELETE FROM `purch_donate` WHERE `pd_id`='$_POST[pd_id]'");
                ?>
                    <script type="text/javascript">
                        alert("Delete Successful.");
                    </script>
            <?php
                }
            }

            if(isset($_POST['submit2']))
            {
                $_SESSION['b_id']=$_POST['b_id'];
                ?>
                <script type="text/javascript">
                    window.location="book_new_edit.php"
                </script>
                <?php
            }

            ?>
        </div>
</body>