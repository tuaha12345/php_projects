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
				<li><a href="pdf.php">PDFs</a></li>
                <li><a href="report_paper.php">Project/Thesis/Intership</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
                <li><a href="about.php">ABOUT</a></li>
            </ul>

            <?php
            if (isset($_SESSION['login_user'])) {
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="profile.php">
                            <div>
                                <?php echo "<img class='img-circle profile_img' height=30 width=30 src='../assets/images/" . $_SESSION['pic'] . "'>"; ?>
                                <?php echo $_SESSION['login_user']; ?>
                            </div>
                        </a>
                    </li>
                    <li><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </nav>
    <?php
    if (isset($_SESSION['login_user'])) {
        $day = 0;

        $exp = '<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $res = mysqli_query($db, "SELECT * FROM `issue_book` where `username` ='$_SESSION[login_user]' and `approve` ='$exp' ;");

        while ($row = mysqli_fetch_assoc($res)) {
            $d = strtotime($row['return_date']);
            $c = strtotime(date("Y-m-d"));
            $diff = $c - $d;

            if ($diff >= 0) {
                $day = $day + floor($diff / (60 * 60 * 24));
                // echo floor($diff/(60*60*24));
                // echo date("Y-m-d");
                // echo $day;
            } //Days

        }
        $_SESSION['fine'] = $day * 5; //per day 5 taka fine
    }
    ?>
</body>

</html>