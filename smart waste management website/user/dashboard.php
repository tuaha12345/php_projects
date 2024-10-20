<?php
include '../db.php';  // Include the DB connection
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$user_query = "SELECT name, email, location FROM Users WHERE user_id = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);

// Fetch notifications
$notifications_query = "
    SELECT n.collection_date, w.waste_name 
    FROM Notifications n 
    JOIN Waste_Types w ON n.waste_type_id = w.waste_type_id 
    WHERE n.user_id = $user_id 
    ORDER BY n.collection_date ASC 
    LIMIT 5";
$notifications = mysqli_query($conn, $notifications_query);

// Fetch leaderboard with total points summed for each user
$leaderboard_query = "
    SELECT u.name, SUM(l.points) as total_points
    FROM Leaderboard l 
    JOIN Users u ON l.user_id = u.user_id 
    GROUP BY u.user_id
    ORDER BY total_points DESC 
    LIMIT 10";
$leaderboard = mysqli_query($conn, $leaderboard_query);


// Fetch user's rank and points
$user_stats_query = "
    SELECT points, 
    (SELECT COUNT(*) + 1 FROM Leaderboard WHERE points > l.points) AS rank 
    FROM Leaderboard l 
    WHERE user_id = $user_id";
$user_stats_result = mysqli_query($conn, $user_stats_query);
$user_stats = mysqli_fetch_assoc($user_stats_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <!-- *************** boostrap & others link *************** -->
        <?php  include '../components/boostrap_link.php'; ?>
    <title>Dashboard - Smart Waste Management System</title>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            color: #28a745 !important;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><i class="fas fa-recycle"></i> Smart Waste</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4 text-secondary">Welcome, <?php echo htmlspecialchars($user_data['name']); ?>!</h1>
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Upcoming Collections</h2>
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($notifications) > 0): ?>
                            <ul class="list-group">
                            <?php while ($row = mysqli_fetch_assoc($notifications)): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo htmlspecialchars($row['waste_name']); ?>
                                    <span class="badge bg-primary rounded-pill"><?php echo date('M d, Y', strtotime($row['collection_date'])); ?></span>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <p>No upcoming collections.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Leaderboard</h2>
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($leaderboard) > 0): ?>
                            <ol class="list-group list-group-numbered">
                            <?php while ($row = mysqli_fetch_assoc($leaderboard)): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo htmlspecialchars($row['name']); ?>
                                    <span class="badge bg-success rounded-pill"><?php echo $row['total_points']; ?> points</span>
                                </li>
                            <?php endwhile; ?>
                            </ol>
                        <?php else: ?>
                            <p>No leaderboard data available.</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Your Stats</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Rank:</strong> <?php echo isset($user_stats['rank']) ? $user_stats['rank'] : 'N/A'; ?></p>
                        <p><strong>Points:</strong> <?php echo isset($user_stats['points']) ? $user_stats['points'] : 0; ?></p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Quick Actions</h2>
                    </div>
                    <div class="card-body">
                        <a href="features/special_pickups.php" class="btn btn-success btn-block mb-2">Request Special Pickup</a>
                        <a href="features/feedback.php" class="btn btn-outline-success btn-block">Give Feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!--------- footer----------->
   <?php include '../components/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
