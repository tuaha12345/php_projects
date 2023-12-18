<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <style>
        tr{
            text-align:center;
        }
        h3,h2{
            font-weight: bold;
        }
    </style>
</head>

<body>
    
<?php
        $res1=mysqli_query($db,"SELECT COUNT(`bid`) AS `total1` FROM `books`;");
        $row1=mysqli_fetch_assoc($res1);
        $res=mysqli_query($db,"SELECT COUNT(`id`) AS `total` FROM `student` ;");
        $row=mysqli_fetch_assoc($res);
    ?>

    <div  style="background-image: url('../assets/images/admin_index.jpg');
    background-position: center;
    background-repeat: no-repeat;
    ">
    <table>
        <tr>
        <td>
        <table border="2" width="300">
            <tr>
                <td>
                    <h3>
                        <a href="add_books.php">Add Books</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="books.php">Edit Books</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="books.php">Delete Books</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="request.php">Books Request</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="issue_info.php">Issue Information</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="expired.php">Expired List</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="fine.php">Fine List</a>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>
                        <a href="admin_status.php">Admin Request</a>
                    </h3>
                </td>
            </tr>
            
            <tr>
                <td>
                    <h3>
                        <a href="online_payment.php">Online Payment Status</a>
                    </h3>
                </td>
            </tr>
        </table>
        </td>
    </div>
    <div>
        <td>
        <table border="2">
            <tr>
                <td>
                    <h2>
                        Total Registered Student
                    </h2>
                    <h2><a href="student.php"><?php echo $row['total']; ?></a></h2>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>
                        Total Books
                    </h2>
                    <h2><a href="books.php"><?php echo $row1['total1']; ?></a></h2>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    </table>
    </div>
</body>
</html>
