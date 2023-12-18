 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="40"> <!-- Auto-refresh every 40 seconds -->
    <title>Auto-Submit Form</title>
</head>
<body>

    <!-- <h1>Auto-Submit Form Example</h1> -->

    <form id="myForm" action="mail.php" method="post">

     <input type="hidden" name="name" value="Librarian ">
     <input type="hidden" name="email" value="robotprojectbd@gmail.com">
     <input  type="hidden" name="subject" value="Book Remainder...">
     <input  type="hidden" name="message" value="Dear student,This is a friendly reminder that the book is due in 2 days. We hope you've enjoyed reading it!
        Please make sure to return the book to the library by time. 
        Best regards ">

     <input  type="hidden" name="send" value="submit">

    </form>



<?php
// Assuming you have a database connection established
include '../inc/connect.php';

// Your SQL query
// $sql = "SELECT return_date FROM remainder WHERE approve = 'yes'";
$sql = "SELECT return_date FROM remainder WHERE approve = 'yes' AND return_date < DATE_ADD(NOW(), INTERVAL 3 DAY)";

// Perform the query
$result = mysqli_query($db, $sql);

// Fetch the result
while ($row = mysqli_fetch_assoc($result)) {
    $returnDate = $row['return_date'];

    // Calculate the time remaining
    $currentDate = date('Y-m-d H:i:s');
    $timeRemaining = strtotime($returnDate) - strtotime($currentDate);

    // Calculate days, hours, minutes, and seconds
    $daysRemaining = floor($timeRemaining / (60 * 60 * 24));
    $hoursRemaining = floor(($timeRemaining % (60 * 60 * 24)) / (60 * 60));
    $minutesRemaining = floor(($timeRemaining % (60 * 60)) / 60);
    $secondsRemaining = $timeRemaining % 60;

    // Check if the remaining time is less than 3 days, 14 hours, and 30 minutes
    if ($daysRemaining == 2 && $hoursRemaining = 7  && ($minutesRemaining < 15 && $minutesRemaining>=14) ){
          echo "submiteed";
           echo "<script>
    setTimeout(function() {
        document.getElementById('myForm').submit();
    },0); 
</script>";


    } else {
        // Your code for when the remaining time is greater than or equal to the specified duration
        echo "Time Remaining: {$daysRemaining} days, {$hoursRemaining} hours, {$minutesRemaining} minutes, {$secondsRemaining} seconds<br>";


    }









}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($db);
?>




</body>
</html>