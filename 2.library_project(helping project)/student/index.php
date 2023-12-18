<?php
session_start();
include '../inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Library Management System</title>
    
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/bootstrap4.min.css">
	<script>(function(w, d) { w.CollectId = "64f6ed7f8a3fde15c3ecd59e"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">   
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"><img src="../assets/images/icon.png" width="70" alt="logo">&nbsp LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <?php
            if(isset($_SESSION['login_user']))
            {
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books.php">Books</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="new_books_info.php">New books release info</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="report_paper.php">Project/Thesis/Intership</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="pdf.php">PDFs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="../inc/logout.php">LOGOUT</a>
                </li>
            </ul>
            <?php
            } ?>
    </nav>
    <?php
        $res1=mysqli_query($db,"SELECT COUNT(`bid`) AS `total` FROM `books`;");
        $row1=mysqli_fetch_assoc($res1);
        $res=mysqli_query($db,"SELECT * FROM `fine` where `username`='$_SESSION[login_user]' ;");
        $row=mysqli_fetch_assoc($res);
    ?>
    <section class="index">
        <div class="sec_img">
            <div class="index_index">
                <div class="box">
                    <br><br>
                    <table border="10">
                        <tr align="center">
                            <td>
                                <h1>Total Books in Library</h1>
                                <h2> <a href="books.php"> <?php echo $row1['total']; ?></a> </h2>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table border="10">
                        <tr align="center">
                            <td>
                                <h2>Read  and Grow</h2>
                                <!--<h3> <a href="fine.php"> <?php echo $row['fine']; ?> &nbsp;৳ </a> </h3>--> 
                            </td>
                        </tr> 
                    </table>
                </div>
            </div>
        </div>
    </section>
    </div>
</body>
<?php include '../inc/footer.php'; ?>
</html>