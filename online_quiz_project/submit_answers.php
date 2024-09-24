<?php
// Database connection
include 'db.php'; // Make sure this file contains $mysqli = mysqli_connect(...);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $answers = $_POST['answers']; // Array of question_id as key and answer as value
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']); // Sanitize user name
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']); // Sanitize user ID
    $form_name = mysqli_real_escape_string($mysqli, $_GET['form_name']); // Sanitize form_name

    // Loop through each answer and insert into the database
    foreach ($answers as $question_id => $answer) {
        $question_id = intval($question_id); // Ensure question_id is an integer
        $answer = mysqli_real_escape_string($mysqli, $answer); // Sanitize the answer

        // Prepare and execute the SQL query to insert each answer with user info
        $insert_answer_sql = "INSERT INTO answers (question_id, answer, form_name, user_name, user_id) VALUES ($question_id, '$answer', '$form_name', '$user_name', '$user_id')";
        if (!mysqli_query($mysqli, $insert_answer_sql)) {
            // If there's an error, display it and stop execution
            echo "Failed to submit your answer for question ID $question_id: " . mysqli_error($mysqli);
            exit;
        }
    }

    // If everything is successful, show confirmation
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submission Confirmation</title>
        <link rel="stylesheet" href="css/submited_ans.css">
    </head>
    <body>
        <div class="confirmation-message">
            Your answers have been successfully submitted!<br>
            <a href="user.php?form_name=' . $form_name . '">Return to the form</a><br>
            <a style="color:orange;" href="reviewing_ans.php?form_name=' . $form_name . '&user_id=' . $user_id . '&user_name=' . $user_name . '" >See your answers</a>
        </div>
    </body>
    </html>';
}
?>
