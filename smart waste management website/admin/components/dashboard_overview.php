<div id="dashboard" class="card mb-3">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <h5>Overview</h5>
                        <p>Total Users: <?php echo $user_result->num_rows; ?></p>
                        <p>Total Pickup Requests: <?php echo $pickup_result->num_rows; ?></p>
                        <p>Total Feedbacks: <?php echo $feedback_result->num_rows; ?></p>
                    </div>
                </div>