 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1"> <!-- Auto-refresh every 5 seconds -->
    <title>Auto-Submit Form</title>
</head>
<body>

    <h1>Auto-Submit Form Example</h1>

    <form id="myForm" action="show.php" method="post">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Submit">
    </form>



<?php
// Assuming you have a database connection established
include '../inc/connect.php';

// Your SQL query
$cd = date('Y-m-d');
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
    if ($daysRemaining == 3 && $hoursRemaining = 1  && $minutesRemaining < 15) {
          echo "submiteed";
            echo "Time Remaining: {$daysRemaining} days, {$hoursRemaining} hours, {$minutesRemaining} minutes, {$secondsRemaining} seconds<br>";
           echo "<script>
    setTimeout(function() {
        document.getElementById('myForm').submit();
    },0); 
</script>";

          $time=3000;
    } else {
        // Your code for when the remaining time is greater than or equal to the specified duration
        echo "Time Remaining: {$daysRemaining} days, {$hoursRemaining} hours, {$minutesRemaining} minutes, {$secondsRemaining} seconds<br>";
        $time=30000000000;

    }


$time = intval($time);






}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($db);
?>


<?php
// Assuming $time is a string, convert it to an integer

// $time=5000;

?>











</body>
</html>