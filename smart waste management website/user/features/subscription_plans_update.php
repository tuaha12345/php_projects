<?php
include '../db.php'; // Include database connection
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM Subscription WHERE user_id = $user_id ";
$result1 = mysqli_query($conn, $sql1);

    // echo " <div class='text-center d-flex justify-content-center pt-5'>
    // <div class='alert alert-success w-50' role='alert'>
    // Your subscription is going to be ended soon!!! Update your subscription
    // </div></div>";
    $text="Update Now";
    $message="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $plan = $_POST['plan'];
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+1 month'));
        
        // Set the subscription amount based on the selected plan
        $amount = ($plan == 'basic') ? 10.00 : (($plan == 'standard') ? 20.00 : 30.00);  // Example amounts
    
        // Check if user already has an active subscription
        $check_sql = "SELECT end_date FROM Subscription WHERE user_id = $user_id AND end_date >= CURDATE()";
        $check_result = mysqli_query($conn, $check_sql);
        $rows=mysqli_num_rows($check_result);
            // Insert new subscription
            $sql = "UPDATE Subscription 
            SET start_date = '$start_date', end_date = '$end_date', amount = '$amount', status = 1
            WHERE user_id = '$user_id'";
            
            if (mysqli_query($conn, $sql)) {
                    $message= "<div class='text-center d-flex justify-content-center pt-5'>
                        <div class='alert alert-success w-50' role='alert'>
                        Subscription successful!
                        </div></div>";
            } else {
                
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
            }
        
    }



// Handle subscription form submission

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- *************** boostrap & others link *************** -->
    <?php  include '../../components/boostrap_link.php'; ?>
    <title>Subscription Plans</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">

    <style>
        <?php include '../../css/user/subscription_plans.css'; ?>
    </style>
</head>
<body>
              <!-- *************** navbar *************** -->
              <?php 
           include '../../components/feature_navbar.php';
           ?>
    <div class=" body_container container my-5">
        <h2 class="text-center mb-4">Choose Your Subscription Plan</h2>
        <p class="text-center mb-4">Subscribe to one of our plans and get access to top-tier waste management services, ensuring a cleaner and more sustainable environment.</p>
        <div>
            <?php echo $message; ?>
        </div>
        <form method="POST" action="">
            <!-- Basic Plan -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Basic Plan</h5>
                    <p class="plan-price">$10/month</p>
                    <p class="card-text">This plan offers our essential waste management service, perfect for individual households with minimal waste disposal needs.</p>
                    <p class="plan-description">Includes: Weekly waste pickup, basic recycling services.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" value="basic" id="basicPlan" required>
                        <label class="form-check-label" for="basicPlan">Select Basic Plan</label>
                    </div>
                </div>
            </div>

            <!-- Standard Plan (Popular) -->
            <div class="card mb-4 popular-plan">
                <div class="card-body">
                    <h5 class="card-title">Standard Plan</h5>
                    <p class="plan-price">$20/month</p>
                    <p class="card-text">The perfect balance between value and service. The standard plan is designed for households or businesses with moderate waste output.</p>
                    <p class="plan-description">Includes: Twice-weekly waste pickup, priority recycling, occasional bulk waste removal.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" value="standard" id="standardPlan" required>
                        <label class="form-check-label" for="standardPlan">Select Standard Plan</label>
                    </div>
                    <span class="badge bg-success mt-3">Most Popular</span>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Premium Plan</h5>
                    <p class="plan-price">$30/month</p>
                    <p class="card-text">For those with more demanding waste management needs, this plan offers premium services including extra pickups and specialized recycling programs.</p>
                    <p class="plan-description">Includes: Daily waste pickup, extended recycling options, premium bulk waste removal, and hazardous waste management.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" value="premium" id="premiumPlan" required>
                        <label class="form-check-label" for="premiumPlan">Select Premium Plan</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success"><?php echo $text;  ?></button>
        </form>
    </div>
   <!--------- footer----------->
   <?php include '../../components/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
