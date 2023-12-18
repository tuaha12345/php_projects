<?php
include '../inc/connect.php';
include 'admin_navbar.php';

// Handle marking fines as paid
if (isset($_POST['mark_as_paid'])) {
    $fine_id = $_POST['fine_id'];

    // Update the status to "paid" for the selected fine
    $update_query = "UPDATE `fine` SET `status` = 'paid' WHERE `fine_id` = $fine_id";
    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        // Fine marked as paid successfully
        echo '<div class="alert alert-success" role="alert">Fine marked as paid.</div>';
    } else {
        // Error updating the status
        echo '<div class="alert alert-danger" role="alert">Error marking the fine as paid.</div>';
    }
}

// Fetch fines with status "not paid"
$query = "SELECT * FROM `fine` WHERE `status` = 'not paid'";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Error: " . mysqli_error($db));
}
?>



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
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">
            
            
            <h3 style="text-align: center; font-weight: bold;">Track the paid fine</h3>
            
    <h2>Fines with Status "Not Paid"</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Fine ID</th><th>Username</th><th>Book ID</th><th>Returned Date</th><th>Days</th><th>Fine Amount</th><th>Status</th><th>Action</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['fine_id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['returned_date'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['fine'] . " ৳</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo '<td><form method="post" action="">
                    <input type="hidden" name="fine_id" value="' . $row['fine_id'] . '">
                    <button type="submit" name="mark_as_paid" class="btn btn-success">Mark as Paid</button>
                </form></td>';
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No fines with status 'Not Paid' found.";
    }
    ?>

        </div>
</body>