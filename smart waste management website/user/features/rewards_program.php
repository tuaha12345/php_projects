<?php
include '../db.php';  // Include DB connection
session_start();   // Start session to get user info

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch leaderboard and user points
$sql_leaderboard = "
    SELECT u.name, u.user_id, SUM(w.weight) as total_dumped, 
    (SUM(w.weight) * 10) as points 
    FROM Users u 
    JOIN Waste_Dumps w ON u.user_id = w.user_id 
    GROUP BY u.user_id 
    ORDER BY total_dumped DESC
";
$result_leaderboard = mysqli_query($conn, $sql_leaderboard);

// Fetch current user's points and ranking
$sql_user_points = "
    SELECT SUM(w.weight) as user_dumped, (SUM(w.weight) * 10) as user_points 
    FROM Waste_Dumps w 
    WHERE w.user_id = ?
";


$stmt = $conn->prepare($sql_user_points);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_points_result = $stmt->get_result();
$user_points_row = $user_points_result->fetch_assoc();
$stmt->close();

$user_points = $user_points_row['user_points'] ?? 0;
$user_dumped = $user_points_row['user_dumped'] ?? 0;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Rewards Program - Smart Waste Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        <?php include '../../css/user/rewards_program.css'; ?>
    </style>
</head>
<body>
          <!-- *************** navbar *************** -->
              <?php 
          include '../../components/feature_navbar.php';
           ?>   
    <div class="container rewards-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="leaderboard-header text-center">
                        <h2>Leaderboard & Rewards Program</h2>
                        <a href="waste_dumping.php" class="text-decoration-none text-white bg-info p-2">Report Waste <i class="fas fa-external-link-alt"></i> </a>
                    </div>
                    <div class="card-body">
                        <h4>Your Performance</h4>
                        <div class="rewards-details">
                            <p><strong>Total Waste Dumped:</strong> <?php echo htmlspecialchars($user_dumped); ?> kg</p>
                            <p><strong>Your Points:</strong> <?php echo htmlspecialchars($user_points); ?> points</p>
                        </div>

                        <hr>

                        <h4>Leaderboard</h4>
                        <?php if (mysqli_num_rows($result_leaderboard) > 0): ?>
                            <?php
                            $rank = 1;
                            while ($row = mysqli_fetch_assoc($result_leaderboard)): 
                            ?>
                                <div class="leaderboard-item">
                                    <span class="leaderboard-rank"><?php echo $rank++; ?>.</span> 
                                    <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                    <p>Total Dumped: <?php echo htmlspecialchars($row['total_dumped']); ?> kg</p>
                                    <p>Points: <?php echo htmlspecialchars($row['points']); ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No leaderboard data available.</p>
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
