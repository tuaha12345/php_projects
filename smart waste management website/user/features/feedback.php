<?php
include '../db.php';  // Include the DB connection
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback_text = trim($_POST['feedback_text']);
    $feedback_type = trim($_POST['feedback_type']);
    $feedback_date = date('Y-m-d H:i:s');

    if (!empty($feedback_text)) {
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO Feedback (user_id, feedback_text, feedback_type, feedback_date) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $user_id, $feedback_text, $feedback_type, $feedback_date);

        if ($stmt->execute()) {
            $message = "Thank you for your feedback!";
            $message_type = "success";
        } else {
            $message = "Error: " . $stmt->error;
            $message_type = "danger";
        }
        $stmt->close();
    } else {
        $message = "Feedback cannot be empty!";
        $message_type = "warning";
    }
}

// Fetch user's previous feedback
$sql_previous = "SELECT feedback_text, feedback_type, feedback_date FROM Feedback WHERE user_id = ? ORDER BY feedback_date DESC LIMIT 3";
$stmt_previous = $conn->prepare($sql_previous);
$stmt_previous->bind_param("i", $user_id);
$stmt_previous->execute();
$previous_feedback = $stmt_previous->get_result();
$stmt_previous->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- *************** boostrap & others link *************** -->
    <?php  include '../../components/boostrap_link.php'; ?>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Submit Feedback - Smart Waste Management</title>
    <style>
    <?php include '../../css/user/feedback.css'; ?>
    </style>
</head>
<body>
          <!-- *************** navbar *************** -->
          <?php 
          include '../../components/feature_navbar.php';
           ?>
    <div class="container feedback-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header feedback-header">
                        <h2><i class="fas fa-comment-alt me-2"></i>Submit Feedback</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($message)): ?>
                            <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($message); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="feedback_type" class="form-label">Type of Feedback</label>
                                <select id="feedback_type" name="feedback_type" class="form-select" required>
                                    <option value="Issue">Issue</option>
                                    <option value="Appreciation">Appreciation</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="feedback_text" class="form-label">Your feedback</label>
                                <textarea id="feedback_text" name="feedback_text" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-paper-plane me-2"></i>Submit Feedback
                            </button>
                        </form>

                        <?php if ($previous_feedback->num_rows > 0): ?>
                            <div class="previous-feedback mt-4">
                                <h4><i class="fas fa-history me-2"></i>Your Previous Feedback</h4>
                                <?php while ($row = $previous_feedback->fetch_assoc()): ?>
                                    <div class="feedback-item">
                                        <p><strong>Type:</strong> <?php echo htmlspecialchars($row['feedback_type']); ?></p>
                                        <p><?php echo htmlspecialchars($row['feedback_text']); ?></p>
                                        <small class="text-muted">Submitted on <?php echo date('M d, Y', strtotime($row['feedback_date'])); ?></small>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!--------- footer----------->
   <?php include '../../components/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
