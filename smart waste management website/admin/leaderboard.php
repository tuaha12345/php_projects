<?php 
include 'function.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch leaderboard data by summing points per user
$sql_leaderboard = "SELECT u.user_id, u.name, SUM(l.points) as total_points 
                    FROM Leaderboard l 
                    JOIN users u ON l.user_id = u.user_id 
                    GROUP BY u.user_id";
$leaderboard_result = $conn->query($sql_leaderboard);

// Handle delete request
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $sql_delete = "DELETE FROM Leaderboard WHERE user_id = '$user_id'";
    $sql_delete2 = "DELETE FROM waste_dumps WHERE user_id = '$user_id'";

    if ($conn->query($sql_delete) === TRUE && $conn->query($sql_delete2) === TRUE) {
        $message = "User deleted from leaderboard successfully!";
        header("Location: leaderboard.php"); // Redirect to avoid form resubmission
        exit;
    } else {
        $message = "Error deleting user: " . $conn->error;
    }
}

// Handle points update (already exists in your code)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_leaderboard'])) {
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];
    
    $sql_insert = "INSERT INTO Leaderboard (user_id, points) VALUES ('$user_id', '$points')";
    
    if ($conn->query($sql_insert) === TRUE) {
        $message = "Leaderboard updated successfully!";
        header("Location: leaderboard.php"); // Redirect to avoid form resubmission
        exit;
    } else {
        $message = "Error updating leaderboard: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Leaderboard - Smart Waste Management System</title>
    <link rel="icon" type="image/x-icon" href="../user/images/admin.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <?php include 'components/navbar.php'; ?>

    <div class="container mt-5">
        <h3 class="text-center text-secondary py-3">Leaderboard</h3>
        <div class="row">
            <?php include 'components/list_group.php'; ?>

            <div class="col-md-9">
                <!-- Dashboard Overview -->
                <?php include 'components/dashboard_overview.php'; ?>

                <!-- Manage Leaderboard -->
                <div id="leaderboard" class="card mb-3">
                    <div class="card-header">Manage Leaderboard</div>
                    <div class="card-body">
                        <!-- Show Top Users with Total Points -->
                        <h5>Top Users</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Total Points</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $leaderboard_result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo $row['total_points']; ?> points</td>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <button type="submit" name="delete_user" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
