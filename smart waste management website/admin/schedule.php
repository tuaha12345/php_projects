<?php 
include 'function.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin schedule- Smart Waste Management System</title>
    <link rel="icon" type="image/x-icon" href="../user/images/admin.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <?php include 'components\navbar.php'; ?>

    <div class="container mt-5">
    <h3 class="text-center text-secondary py-3">Schedule Collection</h3>
        <div class="row">
        <?php include 'components\list_group.php'; ?>

            <div class="col-md-9">
                <!-- Dashboard Overview -->
                <?php include 'components\dashboard_overview.php'; ?>

            <!-- Schedule Waste Collection -->
            <div id="schedule" class="card mb-3">
                <div class="card-header">Schedule Waste Collection</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="collection_date" class="form-label">Collection Date</label>
                            <input type="date" class="form-control" name="collection_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="waste_type" class="form-label">Waste Type</label>
                            <select class="form-control" name="waste_type" required>
                                <option value="1">Plastic</option>
                                <option value="2">Paper</option>
                                <option value="3">Glass</option>
                                <option value="4">Hazardous Material (e.g., Batteries, Chemicals)</option>
                                <!-- Add more waste types as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>
                        <input type="hidden" name="schedule_collection" value="1">
                        <button type="submit" class="btn btn-primary">Schedule</button>
                    </form>
                </div>
            </div>

            <!-- List of Scheduled Collections -->
            <div id="schedule-list" class="card mb-3">
                <div class="card-header">Scheduled Waste Collections</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Collection Date</th>
                                <th>Waste Type</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_list = "SELECT wc.collection_id, wt.waste_name, wc.collection_date, wc.location 
                                            FROM waste_collection wc 
                                            JOIN waste_types wt ON wc.waste_type_id = wt.waste_type_id";
                            $result_list = $conn->query($sql_list);

                            if ($result_list->num_rows > 0) {
                                while ($row = $result_list->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['collection_date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['waste_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                                    echo "<td><a href='?delete_id=" . $row['collection_id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No scheduled collections found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include '../components/footer.php'; ?>
</body>
</html>
