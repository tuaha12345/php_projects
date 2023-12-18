<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
    <title>Approve Admin Request</title>
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
    <div class="srch">
        <form class="navbar-form" method="post" name="form1" action="">
            <input class="form-control" type="text" name="search" placeholder="write one id at a time"  required="">
            <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-default">
                <span>Approve</span>
            </button>
        </form>
    </div>

    <h3 style="text-align: center;">New Admin Request</h3>
    <?php
        $res=mysqli_query($db, "SELECT `id`,`username`,`email`,`phone`,`status` FROM `admin` WHERE `status`='';");
        
        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT `id`,`username`,`email`,`phone` FROM `admin` WHERE `id` LIKE '%$_POST[search]%' AND `status`='';");
            
            if(mysqli_num_rows($q)==0)
            {
                ?>
                <h4 style="text-align: center;">ID is not found in the new admin request.</h4>
                <?php
            }
            else
            {
                echo "<table class='table table-bordered'>";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "ID"; echo "</th>";
                        echo "<th>"; echo "Username"; echo "</th>";
                        echo "<th>"; echo "Email"; echo "</th>";
                        echo "<th>"; echo "Phone"; echo "</th>";
                        echo "<th style='text-align: center'>"; echo "Remove/Approve"; echo "</th>";
                    echo "</tr>";

                while($row=mysqli_fetch_assoc($q))
                {
                    $_SESSION['test_id']=$row['id'];
                    echo "<tr>";
                        echo "<td>"; echo $row['id']; echo "</td>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['email']; echo "</td>";
                        echo "<td>"; echo $row['phone']; echo "</td>";
                        ?><td style="text-align: center">
                            <form class="navbar-form" method="post" name="form1" action="">
                                <button style="color: red" class="glyphicon glyphicon-remove" type="submit" name="submit1"></button>
                                <button style="color: green" class="glyphicon glyphicon-ok" type="submit" name="submit2"></button>
                            </form>
                        </td> 
                        <?php              
                    echo "</tr>";
                }
                echo "</table>";

            }
        }

        else if(mysqli_num_rows($res)>0)
        {

            echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #61c6e4;'>";
                echo "<th>"; echo "ID"; echo "</th>";
                echo "<th>"; echo "Username"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "<th>"; echo "Phone"; echo "</th>";
                echo "<th>"; echo "Status"; echo "</th>";
            echo "</tr>";
            echo "</table>";
            
            echo "<table class='table table-bordered'>";    
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                    echo "<td>"; echo $row['id']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "<td>"; echo $row['phone']; echo "</td>";
                    echo "<td>"; echo $row['status']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        else
        {
            ?>
            <h3 style="text-align: center;">There is no pending admin request</h3>
            <?php
        }
        if(isset($_POST['submit1']))
        {
            mysqli_query($db,"DELETE FROM `admin`  WHERE id='$_SESSION[test_id]' AND `status`='';");
            unset($_SESSION['test_id']);
        }
        if(isset($_POST['submit2']))
        {
            mysqli_query($db,"UPDATE `admin` SET `status`='yes' WHERE id='$_SESSION[test_id]';");
            unset($_SESSION['test_id']);
        }

    ?>
    </div>
</body>
