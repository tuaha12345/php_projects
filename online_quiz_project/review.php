<?php
// Database connection
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions and Answers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .question-container {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .question-container strong {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }
        .question-container .options {
            margin-top: 10px;
        }
        .question-container .options li {
            list-style-type: disc;
            margin-left: 20px;
            color: #555;
        }
        .question-container .answer {
            margin-top: 10px;
            color: #0a7bff;
        }
        .no-questions {
            font-size: 18px;
            color: #ff0000;
        }
    </style>
</head>
<body>

<?php

// Fetch questions
$query = "SELECT * FROM questions";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($question = $result->fetch_assoc()) {
        echo "<div class='question-container'>";
        echo "<strong>Question:</strong> " . htmlspecialchars($question['question']) . "<br>";
        echo "<strong>Type:</strong> " . htmlspecialchars($question['question_type']) . "<br>";

        if ($question['question_type'] == 'multiple') {
            // Fetch options for multiple choice questions
            $stmt = $mysqli->prepare("SELECT option_text FROM options WHERE question_id = ?");
            $stmt->bind_param("i", $question['id']);
            $stmt->execute();
            $options_result = $stmt->get_result();

            echo "<ul class='options'><strong>Options:</strong><br>";
            while ($option = $options_result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($option['option_text']) . "</li>";
            }
            echo "</ul>";
            $stmt->close();

        } elseif ($question['question_type'] == 'truefalse') {
            // Fetch the true/false answer
            $stmt = $mysqli->prepare("SELECT answer FROM answers WHERE question_id = ?");
            $stmt->bind_param("i", $question['id']);
            $stmt->execute();
            $answer_result = $stmt->get_result();
            $answer = $answer_result->fetch_assoc();

            if ($answer) {
                echo "<div class='answer'><strong>Answer:</strong> " . htmlspecialchars($answer['answer']) . "</div>";
            } else {
                echo "<div class='answer'><strong>Answer:</strong> No answer found.</div>";
            }
            $stmt->close();
        }

        echo "</div>";
    }
} else {
    echo "<div class='no-questions'>No questions found.</div>";
}

// Close the database connection
$mysqli->close();
?>

</body>
</html>
