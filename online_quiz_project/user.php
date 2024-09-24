<?php
// Database connection 
include 'db.php'; // Ensure db.php contains $mysqli = mysqli_connect(...);

// Fetch all questions for the form
$form_name = mysqli_real_escape_string($mysqli, $_GET['form_name']); // Sanitize the form name
$query = "SELECT * FROM questions WHERE form_name = '$form_name'";
$result = mysqli_query($mysqli, $query);

$questions = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($form_name); ?> - User Form</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2><?php echo htmlspecialchars($form_name); ?></h2>
    </div>
    <div class="form-content">
        <form action="submit_answers.php?form_name=<?php echo htmlspecialchars($form_name); ?>" method="post">
            <!-- Input for user name and ID -->
            <div class="user-info">
                <label for="user_name">User Name:</label>
                <input type="text" id="user_name" name="user_name" required>
                <label for="user_id">User ID:</label>
                <input type="text" id="user_id" name="user_id" required>
            </div>

            <?php foreach ($questions as $question): ?>
                <div class="question-block">
                    <label><strong><?php echo htmlspecialchars($question['question']); ?></strong>
                    <?php if (!empty($question['points'])): ?>
                        <span class="points"><?php echo htmlspecialchars($question['points']); ?> points</span>
                    <?php endif; ?>
                    </label>

                    <?php if ($question['question_type'] == 'short'): ?>
                        <input type="text" name="answers[<?php echo $question['id']; ?>]" required>

                    <?php elseif ($question['question_type'] == 'truefalse'): ?>
                        <div class="option">
                            <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="true" required> True</label>
                        </div>
                        <div class="option">
                            <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="false" required> False</label>
                        </div>

                    <?php elseif ($question['question_type'] == 'multiple'): ?>
                        <?php
                        // Fetch options for the multiple-choice question
                        $question_id = intval($question['id']); // Ensure question ID is an integer
                        $options_query = "SELECT * FROM options WHERE question_id = $question_id";
                        $options_result = mysqli_query($mysqli, $options_query);

                        if ($options_result) {
                            while ($option = mysqli_fetch_assoc($options_result)): ?>
                                <div class="option">
                                    <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="<?php echo htmlspecialchars($option['option_text']); ?>" required>
                                        <?php echo htmlspecialchars($option['option_text']); ?>
                                    </label>
                                </div>
                            <?php endwhile;
                        }
                        ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

<script>
// Add any necessary JavaScript here
document.addEventListener('DOMContentLoaded', function() {
    const options = document.querySelectorAll('input[type="radio"]');
    options.forEach(option => {
        option.addEventListener('change', function() {
            this.closest('.option').style.backgroundColor = this.checked ? '#e8f0fe' : 'transparent';
        });
    });
});
</script>

</body>
</html>
