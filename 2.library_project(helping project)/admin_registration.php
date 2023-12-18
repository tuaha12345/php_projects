<?php
include 'inc/connect.php';
include 'navigation.php';
?>
<head>
    <title>Admin Registration</title>
</head>

<body>
    <section>
        <div class="reg_img">
            <div class="reg_reg">
                <div class="box2">
                    <br>
                    <h2 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Library Management System</h2>
                    <h1 style="text-align: center; font-size: 25px;">Admin Registration</h1><br>
                    <form action="" method="post" name="Registration">
                        <div class="login">
                            <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                            <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                            <input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
                            <input class="form-control" type="text" name="phone" placeholder="Contact No" required=""><br>
                            <input class="btn btn-light" type="submit" name="submit" value="Sign Up" style="color: black; height: 30px; width: 80px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

    <?php
        if(isset($_POST['submit']))
        {
            $count=0;
            $sql="SELECT `username` FROM `admin`";
            $res=mysqli_query($db, $sql);
            $hash=password_hash($_POST['password'],PASSWORD_BCRYPT);

            while($row=mysqli_fetch_assoc($res))
            {
                if($row['username']==$_POST['username'])
                {
                    $count=$count+1;
                }
            }
            if($count==0)
            {
                mysqli_query($db, "INSERT INTO `admin` (`username`, `password`, `email`, `phone`,`pic`,`status`) VALUES ('$_POST[username]', '$hash', '$_POST[email]', '$_POST[phone]','pic.jpg','')");
    ?>
                <script type="text/javascript">
                    window.confirm("Rgistration Successful But wait for Approve.");
                    window.location="index.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                     alert("The Usrname already exist.");
                </script>
                <?php    
            }
        }
                ?>
    <?php include 'inc/footer.php'; ?>
