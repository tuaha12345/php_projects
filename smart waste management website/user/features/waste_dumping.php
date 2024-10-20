<?php
include '../db.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $waste_type_id = $_POST['waste_type_id'];
    $weight = $_POST['weight'];
    $dump_date = date('Y-m-d H:i:s');

    // Ensure waste type and weight are provided
    if (!empty($waste_type_id) && !empty($weight)) {
        // Prepare the SQL statement in procedural style
        $sql = "INSERT INTO waste_dumps (user_id, waste_types, weight, dump_date) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);


        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "iiis", $user_id, $waste_type_id, $weight, $dump_date);


        // insert into leaderboard table
        $points=$weight*10;
        $sql2 = "INSERT INTO leaderboard (user_id, points) VALUES (?, ?)";
        $stmt2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt2, "ii", $user_id, $points);
        $run_query=mysqli_stmt_execute($stmt2);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $message = "Waste dump recorded successfully!";
            $message_type = "success";
        } else {
            $message = "Error: " . mysqli_error($conn);
            $message_type = "danger";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $message = "Please provide all required details.";
        $message_type = "warning";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Waste Dump</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
              <!-- *************** navbar *************** -->
              <?php 
          include '../../components/feature_navbar.php';
           ?> 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Record Waste Dump</h3>
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
                                <label for="waste_type_id" class="form-label">Waste Type</label>
                                <select id="waste_type_id" name="waste_type_id" class="form-select" required>
                                    <option value="">Select Waste Type</option>
                                    <option value="1">General Waste</option>
                                    <option value="2">Recycling</option>
                                    <option value="3">Compost</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight (kg)</label>
                                <input type="number" id="weight" name="weight" class="form-control" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Record Dump</button>
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
