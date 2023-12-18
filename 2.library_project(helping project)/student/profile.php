<?php
include '../inc/connect.php';
include 'student_navbar.php';
?>

<head>
    <title>My Profile</title>
</head>
<body class="profile">
    <div class="container">
        <div class="wrapper">
        <form action="" method="post">
            <button class="btn btn-default" style="font-weight: bold; background-color: orange; float: right; width:80px;" name="submit1">Edit</button><br>
        </form>
        <?php
            if(isset($_POST['submit1']))
            {
                ?>
                <script type="text/javascript">
                    window.location="profile_edit.php"
                </script>
                <?php
            }

            $q=mysqli_query($db, "SELECT * FROM `student` WHERE `username`='$_SESSION[login_user]'");
        ?>
        <h2 style="text-align: center; font-weight: bold;">MY PROFILE</h2>
        <?php
            $row=mysqli_fetch_assoc($q);

            echo "<div style='text-align: center; margin-bottom: 20px;'>
                    <img class='img-circle profile-img'  height=100 width=105 src='../assets/images/".$_SESSION['pic']."'>
                </div>";
        ?>
        <?php
            echo "<table class='table table-bordered'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<b> User Name: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['username'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b> Department: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['department'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b> Roll: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['roll'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Email: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['email'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Contact: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['phone'];
                    echo "</td>";
                echo "</tr>";

                
                
            echo "</table>";
        ?>
        <a style="font-weight: bolder; font-size: 15px;" href="../update_student_password.php">Change password?</a>
        <a style="font-weight: bolder; float: right; font-size: 15px;" href="profile_pic_upload.php">Change Profile picture?</a>
        </div>
    </div>
</body>
<?php include '../inc/footer.php'; ?>
