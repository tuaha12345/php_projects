<meta http-equiv="refresh" content="1">
<?php
// Assuming you have a database connection established
include '../inc/connect.php';

// Your SQL query
$sql = "SELECT return_date FROM issue_book WHERE approve = 'yes'";

// Perform the query
$result = mysqli_query($db, $sql);

// Check for errors
if (!$result) {
    die('Error: ' . mysqli_error($db));
}

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

    // Do something with the time remaining
    echo "Time Remaining: {$daysRemaining} days, {$hoursRemaining} hours, {$minutesRemaining} minutes, {$secondsRemaining} seconds<br>";
}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($db);
?>
