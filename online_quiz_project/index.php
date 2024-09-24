<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Forms-like Dynamic Question Form</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>

<form id="questionForm" action="questionDB.php" method="post">
    <div class="form-header">
        <h1 class="form-title">
            Create Questions
            <input type="text" class="question-input" name="form_name" placeholder="Enter Your Form title here.." required>
        </h1>

    </div>

    <div class="form-tabs">
        <div class="form-tab active">Questions</div>
        <!-- <div class="form-tab">Responses</div>
        <div class="form-tab">Settings</div> -->
    </div>

    <div id="questionWrapper">
        <!-- Question blocks will be added here -->
    </div>

    <input type="submit" name="submit" value="Submit">
</form>

<script>
    let questionCounter = 0;

    // Function to add a new question block
    function addQuestion() {
        questionCounter++;
        const wrapper = document.getElementById('questionWrapper');

        // Create the question block HTML
        const questionBlock = document.createElement('div');
        questionBlock.className = 'question-block';
        questionBlock.id = `question_${questionCounter}`;
        questionBlock.innerHTML = `
            <input type="text" class="question-input" name="questions[${questionCounter}][question]" placeholder="Untitled Question" required>
            <select name="questions[${questionCounter}][type]" onchange="handleQuestionTypeChange(${questionCounter})">
                <option value="short">Short answer</option>
                <option value="truefalse">True/False</option>
                <option value="multiple" selected>Multiple choice</option>
            </select>
            <div id="options_${questionCounter}" class="options-container"></div>
            <div class="button-container">
                <button type="button" class="add-option-btn" onclick="addOption(${questionCounter})">Add option</button>
                <div>
                    <button type="button" class="add-question-btn" onclick="addQuestion()">+</button>
                    <button type="button" class="delete-btn" onclick="deleteQuestion(${questionCounter})">Delete</button>
                </div>
            </div>
        `;
        
        // Add the question block to the wrapper
        wrapper.appendChild(questionBlock);
        handleQuestionTypeChange(questionCounter);  // Set initial options
    }

    // Function to handle the change of question type (short answer, true/false, multiple choice)
    // Inside the handleQuestionTypeChange function
    function handleQuestionTypeChange(questionId) {
    const optionsContainer = document.getElementById(`options_${questionId}`);
    const questionType = document.querySelector(`#question_${questionId} select`).value;
    const addOptionBtn = document.querySelector(`#question_${questionId} .add-option-btn`);

    // Clear any previous options
    optionsContainer.innerHTML = '';

    if (questionType === 'truefalse') {
        // For true/false questions
        optionsContainer.innerHTML = `
            <label>Answer</label>
            <select name="questions[${questionId}][answer]">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        `;
        addOptionBtn.style.display = 'none';  // Hide the "Add Option" button for true/false
    } else if (questionType === 'multiple') {
        // For multiple-choice questions, add two default options
        optionsContainer.innerHTML = `
            <div class="radio-label">
                <input type="radio" name="questions[${questionId}][answer]" value="Option 1" required>
                <input type="text" name="questions[${questionId}][options][]" placeholder="Option 1" required>
            </div>
            <div class="radio-label">
                <input type="radio" name="questions[${questionId}][answer]" value="Option 2" required>
                <input type="text" name="questions[${questionId}][options][]" placeholder="Option 2" required>
            </div>
        `;
        addOptionBtn.style.display = 'inline-block';  // Show the "Add Option" button for multiple-choice
    } else if (questionType === 'short') {
        // For short-answer questions
        optionsContainer.innerHTML = `
            <label>Answer</label>
            <input type="text" name="questions[${questionId}][answer]" placeholder="Your answer" required>
        `;
        addOptionBtn.style.display = 'none';  // Hide the "Add Option" button for short-answer
    }
}



    // Function to add a new option for multiple-choice questions
function addOption(questionId) {
    const optionsContainer = document.getElementById(`options_${questionId}`);
    const optionCount = optionsContainer.querySelectorAll('.radio-label').length + 1;

    // Create a new option input field with a corresponding radio button
    const newOption = document.createElement('div');
    newOption.className = 'radio-label';
    newOption.innerHTML = `
        <input type="radio" name="questions[${questionId}][answer]" value="Option ${optionCount}" required>
        <input type="text" name="questions[${questionId}][options][]" placeholder="Option ${optionCount}" required>
    `;

    optionsContainer.appendChild(newOption);  // Add the new option to the container
}


    // Function to delete a question block
    function deleteQuestion(questionId) {
        const questionBlock = document.getElementById(`question_${questionId}`);
        questionBlock.remove();  // Remove the entire question block
    }

    // Automatically add the first question when the page loads
    addQuestion();
</script>


</body>
</html>
