<?php
include 'inc/connect.php';
include 'navigation.php';
?>

<head>
    <title>Admin Login</title>
</head>

<body>
    <section class="login">
        <div class="log_img">
            <div class="log_log">
                <div class="box1">
                    <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Library Management System
                    </h1>
                    <h1 style="text-align: center; font-size: 25px;">Admin Login</h1><br>
                    <form action="" method="post" name="login">
                        <div class="login">
                            <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                            <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                            <input class="btn btn-light" type="submit" name="submit" value="Login" style="color: black; height: 30px; width: 80px;">
                        </div>
                        <p style="color: white; padding-left: 20px;">
                            <br><br>
                            <a style="color: #d9b88b;" href="update_admin_password.php">Forgot password?</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            New to this website?<a style="color: #d9b88b;" href="admin_registration.php">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $res = mysqli_query($db, "SELECT * FROM `admin` WHERE `username`='{$username}' AND `status`='yes'");

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_password = $row['password'];

        if (password_verify($password, $_password)) {
            $_SESSION['login_user'] = $_POST['username'];
            $_SESSION['pic'] = $row['pic'];
            header("Location: admin/index.php");
            die();
        } else {
            $status = "Username and password did not match";
        }
    } else {
        $status = 'Username does not exist/Unregistered Admin';
    }
    header("Location: index.php?status={$status}");
}
?>
<?php include 'inc/footer.php'; ?>