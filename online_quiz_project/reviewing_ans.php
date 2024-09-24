<?php
// Database connection
include 'db.php'; // Ensure db.php contains $mysqli = mysqli_connect(...)

// Get the form name, user ID, and user name
$form_name = mysqli_real_escape_string($mysqli, $_GET['form_name']);
$user_id = intval($_GET['user_id']);
$user_name = mysqli_real_escape_string($mysqli, $_GET['user_name']);

// Fetch all questions for the form
$question_query = "SELECT * FROM questions WHERE form_name = '$form_name'";
$question_result = mysqli_query($mysqli, $question_query);

$questions = [];
if ($question_result) {
    while ($row = mysqli_fetch_assoc($question_result)) {
        $questions[] = $row;
    }
}

// Fetch the user's answers
$answers_query = "SELECT * FROM answers WHERE form_name = '$form_name' AND user_id = $user_id";
$answers_result = mysqli_query($mysqli, $answers_query);

$user_answers = [];
if ($answers_result) {
    while ($row = mysqli_fetch_assoc($answers_result)) {
        $user_answers[$row['question_id']] = $row['answer'];
    }
}

// Calculate score
$correct_count = 0;
$total_questions = count($questions);
foreach ($questions as $question) {
    $correct_answer = $question['correct_answer'];
    $user_answer = isset($user_answers[$question['id']]) ? $user_answers[$question['id']] : 'No answer';
    
    // Convert both answers to lowercase for case-insensitive comparison
    if (strtolower(trim($user_answer)) === strtolower(trim($correct_answer))) {
        $correct_count++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Your Answers</title>
    <link rel="stylesheet" href="css/review.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h2 {
            color: #2c3e50;
        }

        .form-header p {
            font-size: 14px;
            color: #7f8c8d;
        }

        .question-block {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ecf0f1;
            border-radius: 5px;
            background: #fafafa;
        }

        .question-block label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .correct {
            color: green;
            font-weight: bold;
        }

        .incorrect {
            color: red;
            font-weight: bold;
        }

        .question-number {
            font-weight: bold;
            color: #2980b9;
        }

        .score {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2>Review Your Answers for <?php echo htmlspecialchars($form_name); ?></h2>
        <p>User: <?php echo htmlspecialchars($user_name); ?></p>
    </div>
    <div class="form-content">
        <?php foreach ($questions as $index => $question): ?>
            <div class="question-block">
                <label class="question-number">Question <?php echo $index + 1; ?>:</label>
                <strong><?php echo htmlspecialchars($question['question']); ?></strong>

                <?php
                // Get the correct answer from the 'correct_answer' column in the questions table
                $correct_answer = $question['correct_answer'];
                $user_answer = isset($user_answers[$question['id']]) ? $user_answers[$question['id']] : 'No answer';

                // Compare the user's answer to the correct answer
                $is_correct = (strtolower(trim($user_answer)) === strtolower(trim($correct_answer)));
                ?>

                <p>Your answer: <strong><?php echo htmlspecialchars($user_answer); ?></strong></p>
                <p>Correct answer: <strong><?php echo htmlspecialchars($correct_answer); ?></strong></p>

                <?php if ($is_correct): ?>
                    <p class="correct">Your answer is correct!</p>
                <?php else: ?>
                    <p class="incorrect">Your answer is incorrect.</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="score" style="color:green">
        You got <?php echo $correct_count; ?> out of <?php echo $total_questions; ?>.
    </div>
</div>

</body>
</html>
