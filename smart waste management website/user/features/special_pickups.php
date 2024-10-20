<?php
include '../db.php';  // Include the DB connection
session_start();  // Ensure user is logged in

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_description = trim($_POST['item_description']);
    $pickup_type = $_POST['pickup_type'];  // Get pickup type (bulk or hazardous)
    $request_date = date('Y-m-d');

    if (!empty($item_description) && !empty($pickup_type)) {
        $sql = "INSERT INTO Special_Pickups (user_id, item_description, pickup_type, request_date, status) VALUES (?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $user_id, $item_description, $pickup_type, $request_date);

        if ($stmt->execute()) {
            $message = "Special Pickup Requested!";
            $message_type = "success";
        } else {
            $message = "Error: " . $stmt->error;
            $message_type = "danger";
        }
        $stmt->close();
    } else {
        $message = "All fields are required!";
        $message_type = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- *************** boostrap & others link *************** -->
    <?php  include '../../components/boostrap_link.php'; ?>
    <title>Request Special Pickup</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
       <?php include '../../css/user/feedback.css'; ?>
    </style>
</head>
<body>
          <!-- *************** navbar *************** -->
          <?php 
          include '../../components/feature_navbar.php';
           ?>    
    <div class="container pickup-container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="pickup-header">Request Special Pickup</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($message)): ?>
                            <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($message); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-4">
                                <label for="item_description" class="form-label">Describe the item for pickup</label>
                                <textarea id="item_description" name="item_description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="pickup_type" class="form-label">Select Pickup Type</label>
                                <select id="pickup_type" name="pickup_type" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    <option value="bulk">Bulk Item (e.g., Furniture)</option>
                                    <option value="hazardous">Hazardous Material (e.g., Batteries, Chemicals)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100">Request Pickup</button>
                        </form>
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
