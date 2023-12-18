<?php
include 'inc/connect.php';
include 'navigation.php';
?>
<head>
    <title>Books</title>
</head>
<body class="books">
<div class="container">
    <div class="srch">
        <br>
        <form class="navbar-form" method="post" name="form1" action="">
            <input class="form-control" type="text" name="search" placeholder="search books ..."  required="">
            <button style="background-color: #61c6e4;" type="submit" name="submit" class="btn btn-primary">Search
            </button>
        </form>
    </div>

    <h3 style="text-align: center; font-weight: bold;">List Of Books</h3>
    <?php
        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT * FROM `books` WHERE `name` LIKE '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "No book found.";
            }
            else
            {
                echo "<table class='table table-bordered table-hover' style='width:99%'>";
                    echo "<tr style='background-color: #61c6e4;'>";
                        echo "<th>"; echo "ID"; echo "</th>";
                        echo "<th>"; echo "Book_Name"; echo "</th>";
                        echo "<th>"; echo "Authors_Name"; echo "</th>";
                        echo "<th>"; echo "Edition"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Quantity"; echo "</th>";
                        echo "<th>"; echo "Category"; echo "</th>";
                    echo "</tr>";
                echo "</table>";
                echo  "<div class='scroll_book'>";
                echo "<table class='table table-bordered'>";
                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                        echo "<td>"; echo $row['quantity']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
        }

        else
        {

            $res=mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

            echo "<table class='table table-bordered table-hover' style='width:99%'>";
                echo "<tr style='background-color: #61c6e4;'>";
                    echo "<th>"; echo "ID"; echo "</th>";
                    echo "<th>"; echo "Book_Name"; echo "</th>";
                    echo "<th>"; echo "Authors_Name"; echo "</th>";
                    echo "<th>"; echo "Edition"; echo "</th>";
                    echo "<th>"; echo "Status"; echo "</th>";
                    echo "<th>"; echo "Quantity"; echo "</th>";
                    echo "<th>"; echo "Category"; echo "</th>";
                echo "</tr>";
            echo "</table>";
            echo  "<div class='scroll_book'>";
                echo "<table class='table table-bordered'>";
                while($row=mysqli_fetch_assoc($res))
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                        echo "<td>"; echo $row['quantity']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
    ?>
    </div>
    </div>
</body>
<?php include 'inc/footer.php'; ?>
