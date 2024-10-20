<?php

include 'function.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}


// Handle notification deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_notification'])) {
    $notification_id = $_POST['notification_id'];
    $delete_query = "DELETE FROM Notifications WHERE notification_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $notification_id);
    
    if ($stmt->execute()) {
        $delete_message = "Notification deleted successfully!";
    } else {
        $delete_message = "Error deleting notification. Please try again.";
    }
    $stmt->close();
}

// Fetch all locations
$location_query = "SELECT DISTINCT location FROM Users";
$location_result = mysqli_query($conn, $location_query);

// Fetch all waste types
$waste_type_query = "SELECT * FROM Waste_Types";
$waste_type_result = mysqli_query($conn, $waste_type_query);

// Handle form submission for sending notifications
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_notification'])) {
    $location = $_POST['location'];
    $waste_type_id = $_POST['waste_type_id'];
    $message = $_POST['message'];
    $collection_date = $_POST['collection_date'];

    // Insert notification into database (only once per user)
    $insert_query = "INSERT IGNORE INTO Notifications (user_id, waste_type_id, message, collection_date, sent, notification_date) 
                     SELECT DISTINCT user_id, ?, ?, ?, 0, NOW()
                     FROM Users 
                     WHERE location = ?";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("isss", $waste_type_id, $message, $collection_date, $location);
    
    if ($stmt->execute()) {
        $affected_rows = $stmt->affected_rows;
        if ($affected_rows > 0) {
            $notification_message = "Notifications sent successfully to $affected_rows user(s)!";
        } else {
            $notification_message = "No new notifications were sent. Users may have already been notified.";
        }
    } else {
        $notification_message = "Error sending notifications. Please try again.";
    }
    $stmt->close();
}

// ... (rest of the PHP code remains the same)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notifications - Smart Waste Management System</title>
    <link rel="icon" type="image/x-icon" href="../user/images/admin.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'components/navbar.php'; ?>

    <div class="container mt-5">
        <h3 class="text-center text-secondary py-3">Admin Notifications</h3>
        
        <div class="row">
            <?php include 'components/list_group.php'; ?>
            
            <div class="col-md-9">
                <?php include 'components/dashboard_overview.php'; ?>
                
                <!-- Send Notifications -->
                <div id="notifications" class="card mb-3">
                    <div class="card-header">Send Customized Notifications</div>
                    <div class="card-body">
                        <?php if (isset($notification_message)): ?>
                            <div class="alert alert-info"><?php echo $notification_message; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="location" class="form-label">Select Location</label>
                                <select class="form-control" name="location" required>
                                    <?php while($row = mysqli_fetch_assoc($location_result)): ?>
                                        <option value="<?php echo htmlspecialchars($row['location']); ?>"><?php echo htmlspecialchars($row['location']); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="waste_type_id" class="form-label">Select Waste Type</label>
                                <select class="form-control" name="waste_type_id" required>
                                    <?php while($row = mysqli_fetch_assoc($waste_type_result)): ?>
                                        <option value="<?php echo $row['waste_type_id']; ?>"><?php echo htmlspecialchars($row['waste_name']); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="collection_date" class="form-label">Collection Date</label>
                                <input type="date" class="form-control" name="collection_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Notification Message</label>
                                <textarea class="form-control" name="message" required></textarea>
                            </div>
                            <input type="hidden" name="send_notification" value="1">
                            <button type="submit" class="btn btn-primary">Send Notifications</button>
                        </form>
                    </div>
                </div>
                
                <!-- Recent Notifications -->
                <div class="card">
                    <div class="card-header">Recent Notifications</div>
                    <div class="card-body">
                        <?php if (isset($delete_message)): ?>
                            <div class="alert alert-info"><?php echo $delete_message; ?></div>
                        <?php endif; ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Notification Date</th>
                                    <th>Collection Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $recent_notifications_query = "SELECT notification_id, notification_date, collection_date, message, sent 
                                                               FROM Notifications
                                                               ORDER BY notification_date DESC
                                                               LIMIT 10";
                                $recent_notifications_result = mysqli_query($conn, $recent_notifications_query);
                                while ($row = mysqli_fetch_assoc($recent_notifications_result)):
                                ?>
                                <tr>
                                    <td><?php echo $row['notification_date'] ? date('Y-m-d H:i', strtotime($row['notification_date'])) : 'N/A'; ?></td>
                                    <td><?php echo $row['collection_date'] ? date('Y-m-d', strtotime($row['collection_date'])) : 'N/A'; ?></td>
                                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                                    <td><?php echo $row['sent'] ? 'Sent' : 'Pending'; ?></td>
                                    <td>
                                        <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this notification?');">
                                            <input type="hidden" name="notification_id" value="<?php echo $row['notification_id']; ?>">
                                            <input type="hidden" name="delete_notification" value="1">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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