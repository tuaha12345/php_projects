<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<script>(function(w, d) { w.CollectId = "64f6ed7f8a3fde15c3ecd59e"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"> LIBRARY MANAGEMENT SYSTEM</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="paper.php">Project/Thesis/Intership</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
				<li><a href="invoice.php">INVOICE</a></li>
				<li><a href="admin_fine_tracking.php">FINE TRACK</a></li>
				<li><a href="new_books_info.php">NEW INFO</a></li>
				<li><a href="books_purchasing_info.php">PURCHASING and DONATING</a></li>
				
            </ul>

            <?php
            if (isset($_SESSION['login_user'])) {
                $query = mysqli_query($db, "SELECT COUNT(`status`) AS `total` FROM `admin` WHERE `status`='';");
                $status = mysqli_fetch_assoc($query);
                $query1 = mysqli_query($db, "SELECT COUNT(`approve`) AS `total` FROM `issue_book` WHERE `approve`='';");
                $status1 = mysqli_fetch_assoc($query1);
            ?>
                <ul class="nav navbar-nav">
                    <li><a href="student.php">STUDENT_INFORMATION</a></li>
                    <li><a href="report_tracking.php">Report tracking</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin_status.php" title="admin_request">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="badge bg-green"><?php echo $status['total']; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="request.php" title="book_request">
                            <span class="glyphicon glyphicon-book"></span>
                            <span class="badge bg-green"><?php echo $status1['total']; ?></span>
                        </a>                    
                    </li>
                    <li>
                        <a href="profile.php" title="my_profile">
                            <?php echo "<img class='img-circle profile_img' height=30 width=30 src='../assets/images/" . $_SESSION['pic'] . "'>"; ?>
                            <?php echo $_SESSION['login_user']; ?>
                        </a>
                    </li>
                    <li><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                </ul>
            <?php
            } else {
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a>
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                </ul>
            <?php
            }
            ?>

        </div>
    </nav>