<?php
// Database connection
include 'db.php'; // Ensure db.php has your connection settings (e.g., $mysqli = mysqli_connect(...))

// Check if form is submitted
if (isset($_POST['submit'])) {
    if (!isset($_POST['form_name'])) {
        die("Error: 'form_name' is required.");
    }

    $form_name = $_POST['form_name'];
    $questions = $_POST['questions'];

    // Loop through each question
    foreach ($questions as $question) {
        $question_text = mysqli_real_escape_string($mysqli, $question['question']);
        $question_type = mysqli_real_escape_string($mysqli, $question['type']);
        $correct_answer = '';

        // Handle short-answer questions
        if ($question['type'] == 'short') {
            $correct_answer = mysqli_real_escape_string($mysqli, $question['answer']);
        }

        // Handle multiple-choice questions
        elseif ($question['type'] == 'multiple') {
            // Get the correct answer from the selected option
            if (isset($question['options']) && isset($question['answer'])) {
                foreach ($question['options'] as $index => $option) {
                    // Check which option matches the selected answer
                    if ($question['answer'] === "Option " . ($index + 1)) {
                        $correct_answer = mysqli_real_escape_string($mysqli, $option);
                    }
                }
            }
        }

        // Handle true/false questions
        elseif ($question['type'] == 'truefalse') {
            $correct_answer = mysqli_real_escape_string($mysqli, $question['answer']);
        }

        // Insert the question into the questions table
        $insert_question_sql = "INSERT INTO questions (question, question_type, form_name, correct_answer) 
                                VALUES ('$question_text', '$question_type', '$form_name', '$correct_answer')";
        if (mysqli_query($mysqli, $insert_question_sql)) {
            // Get the last inserted question ID
            $question_id = mysqli_insert_id($mysqli);

            // Insert multiple-choice options into the options table
            if ($question['type'] == 'multiple') {
                foreach ($question['options'] as $option) {
                    $option_text = mysqli_real_escape_string($mysqli, $option);
                    $insert_option_sql = "INSERT INTO options (question_id, option_text, form_name) 
                                        VALUES ($question_id, '$option_text', '$form_name')";
                    mysqli_query($mysqli, $insert_option_sql);
                }
            }
        } else {
            echo "Error inserting question: " . mysqli_error($mysqli);
            exit; // Stop execution on error
        }
    }

    // If everything is successful, show confirmation
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submission Confirmation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="css/question_submit.css">
    </head>
    <body>
        <div class="confirmation-message">
            Your questions have been successfully submitted!<br>
            <a href="index.php">Return to the form</a>
            <a href="user.php?form_name=' . $form_name . '"><i class="fas fa-share-square"></i></a>
        </div>
    </body>
    </html>';
}
?>
