<?php
include '../db.php'; // Include the database connection
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch notifications for the user
$notification_sql = "SELECT message, notification_date,collection_date FROM Notifications WHERE user_id = $user_id ORDER BY notification_date DESC";
$notification_result = mysqli_query($conn, $notification_sql);

// Function to format time (e.g., '2 hours ago')
function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- *************** boostrap & others link *************** -->
    <?php  include '../../components/boostrap_link.php'; ?>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Smart Notifications</title>
    <style>
        <?php include '../../css/user/smart_notifications.css'; ?>
    </style>
</head>
<body>
          <!-- *************** navbar *************** -->
          <?php 
          include '../../components/feature_navbar.php';
           ?>   
    <div class="container body_container">
        <h2 class="text-center mb-4">Your Smart Notifications</h2>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                Recent Notifications
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($notification_result) > 0): ?>
                    <ul class="list-group">
                        <?php while ($row = mysqli_fetch_assoc($notification_result)): 
                            // Example: Set type of notification based on message content (customize as needed)
                            $message = htmlspecialchars($row['message']);
                            $notification_date = htmlspecialchars($row['collection_date']);
                            $time_ago = timeAgo($notification_date);
                            
                            $notification_class = 'notification-info'; // Default class
                            if (stripos($message, 'success') !== false) {
                                $notification_class = 'notification-success';
                            } elseif (stripos($message, 'warning') !== false) {
                                $notification_class = 'notification-warning';
                            }
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start <?php echo $notification_class; ?>">
                                <div class="d-flex align-items-center">
                                    <i class="notification-icon bi bi-bell-fill text-primary"></i>
                                    <div>
                                        <div><?php echo $message; ?></div>
                                        <div class="notification-time"><?php echo $row['notification_date']?></div>
                                    </div>
                                </div>
                                <span class="badge bg-secondary"><?php echo date('d M Y', strtotime($notification_date)); ?></span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <div class="empty-state">
                        <img src="https://www.kindpng.com/picc/m/208-2080049_no-new-notification-no-notification-png-transparent-png.png" alt="No Notifications" class="img-fluid" style="max-width: 150px;">
                        <p>You have no notifications at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
   <!--------- footer----------->
   <?php include '../../components/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
