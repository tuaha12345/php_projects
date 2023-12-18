<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<head>
    <title>Student Information</title>
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
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
        }
        </script>
    <div class="container">
    <h4 style="text-align: center;">List Of Students</h4>

    <div class="srch">
        <form class="navbar-form" method="post" name="form1" action="">
            <input class="form-control" type="text" name="search" placeholder="search a student ..."  required="">
            <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
        <div>

        <form class="navbar-form" method="post" name="form2" action="">
            <input class="form-control" type="text" name="username" placeholder="enter student name ..." required="">
            <button style="background-color: #61c6e4;" type="submit" name="submit1" class="btn btn-default">
                <span class="glyphicon glyphicon-trash"></span>
            </button>
        </form>
        </div>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT * FROM `student` WHERE `username` LIKE '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "No student found.";
            }
            else
            {
                echo "<table class='table table-bordered'>";
                    echo "<tr style='background-color: #61c6e4;' style='width:99%;' >";
                        echo "<th>"; echo "Student_Name"; echo "</th>";
                        echo "<th>"; echo "Department"; echo "</th>";
                        echo "<th>"; echo "Roll"; echo "</th>";
                        echo "<th>"; echo "Email"; echo "</th>";
                        echo "<th>"; echo "Phone"; echo "</th>";
                    echo "</tr>";
                echo "</table>";
                echo "<div class='scroll_book'>";
                echo "<table class='table table-bordered'>";           
                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                        echo "<td>"; echo $row['roll']; echo "</td>";
                        echo "<td>"; echo $row['email']; echo "</td>";
                        echo "<td>"; echo $row['phone']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        else
        {

            $res=mysqli_query($db, "SELECT `username`,`department`,`roll`,`email`,`phone` FROM `student`");

            echo "<table class='table table-bordered' style='width:99%;'>";
            echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>"; echo "Student_Name"; echo "</th>";
                echo "<th>"; echo "Department"; echo "</th>";
                echo "<th>"; echo "Roll"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "<th>"; echo "Phone"; echo "</th>";
            echo "</tr>";
            echo "</table>";

            echo "<div class='scroll_book'>";
            echo "<table class='table table-bordered'>";    
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['department']; echo "</td>";
                    echo "<td>"; echo $row['roll']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "<td>"; echo $row['phone']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        if (isset($_POST['submit1'])) {
            $count = 0;
            $sql = "SELECT `username` FROM `student`";
            $res1 = mysqli_query($db, $sql);

            while ($row1 = mysqli_fetch_assoc($res1)) {
                if ($row1['username'] == $_POST['username']) {
                    $count = $count + 1;
                }
            }
            if ($count == 0) {
        ?>
                <script type="text/javascript">
                    alert("Student is not found!");
                </script>
            <?php
            } else {
                mysqli_query($db, "DELETE FROM `student` WHERE `username`='$_POST[username]'");
            ?>
                <script type="text/javascript">
                    alert("Delete Successful.");
                </script>
        <?php
            }
        }
        ?>

    </div>
</body>
