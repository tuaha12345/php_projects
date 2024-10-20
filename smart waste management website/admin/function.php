<?php
include '../db.php'; // Include the DB connection
session_start();

// Check if user is admin (you can use session or any other method to check)
// if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
//     header("Location: login.php");
//     exit;
// }

// Handle scheduling waste collection ***************************************************************
// Handle scheduling waste collection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['schedule_collection'])) {
    $collection_date = $_POST['collection_date'];
    $waste_type = $_POST['waste_type'];
    $location = $_POST['location'];

    $sql = "INSERT INTO Waste_Collection (waste_type_id, collection_date, location) VALUES ('$waste_type', '$collection_date', '$location')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Waste collection scheduled successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Handle deletion of waste collection
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM Waste_Collection WHERE collection_id='$delete_id'";

    if ($conn->query($sql_delete) === TRUE) {
        $message = "Waste collection deleted successfully!";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}

// Handle sending notifications ***************************************************************
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_notification'])) {
//     $user_id = $_POST['user_id'];
//     $message = $_POST['message'];

//     $sql = "INSERT INTO Notifications (user_id, message) VALUES ('$user_id', '$message')";
    
//     if ($conn->query($sql) === TRUE) {
//         $notification_message = "Notification sent successfully!";
//     } else {
//         $notification_message = "Error: " . $conn->error;
//     }
// }

// Handle managing leaderboard  ***************************************************************
//------------
// Fetch user list for notifications ***************************************************************
$user_sql = "SELECT user_id, name FROM Users";
$user_result = $conn->query($user_sql);

// Fetch leaderboard data ***************************************************************
$leaderboard_sql = "SELECT u.name, l.points FROM Leaderboard l JOIN Users u ON l.user_id = u.user_id ORDER BY l.points DESC LIMIT 10";
$leaderboard_result = $conn->query($leaderboard_sql);

// Fetch special pickup requests ***************************************************************
$pickup_sql = "SELECT * FROM Special_Pickups";
$pickup_result = $conn->query($pickup_sql);

    // Handle the delete request
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_pickup'])) {
        $pickup_id = $_POST['pickup_id'];

        // Delete the selected pickup request
        $delete_sql = "DELETE FROM Special_Pickups WHERE request_id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $pickup_id);

        if ($stmt->execute()) {
           // echo "Pickup request deleted successfully!";
        } else {
            echo "Error deleting pickup: " . $conn->error;
        }
    }

// Fetch feedback ***************************************************************
$feedback_sql = "SELECT * FROM Feedback";
$feedback_result = $conn->query($feedback_sql);
    // Handle the delete request
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_feedback'])) {
        $pickup_id = $_POST['feedback_id'];

        // Delete the selected pickup request
        $delete_sql = "DELETE FROM Feedback WHERE feedback_id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $pickup_id);

        if ($stmt->execute()) {
           // echo "Pickup request deleted successfully!";
        } else {
            echo "Error deleting pickup: " . $conn->error;
        }
    }
?>