<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" type="image/png" href="../assets/images/icon.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/bootstrap4.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"><img src="../assets/images/icon.png" width="70" alt="logo">&nbsp ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <?php
            if (isset($_SESSION['login_user'])) {
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">BOOKS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">FEEDBACK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../inc/logout.php">LOGOUT</a>
                    </li>
                </ul>
            <?php
            } ?>
    </nav>
    <section class="index">
        <div class="sec_img">
            <div class="index_index">
                <div class="box">
                    <br><br><br><br>
                    <h1 style="text-align:center; font-size: 35px;">Welcome to Library</h1><br><br>
                    <h1 style="text-align:center; font-size: 25px;">Opens at: 09:00am</h1><br>
                    <h1 style="text-align:center; font-size: 25px;">Closes at: 02:00pm</h1><br>
                </div>
            </div>
        </div>
    </section>
    </div>
</body>
<?php include '../inc/footer.php'; ?>

</html>