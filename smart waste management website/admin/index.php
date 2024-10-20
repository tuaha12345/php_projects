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
    <title>Admin Dashboard - Smart Waste Management System</title>
    <link rel="icon" type="image/x-icon" href="../user/images/admin.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'components\navbar.php'; ?>

    <div class="container mt-5">
        <h3 class="text-center text-secondary py-3">Dashboard</h3>
        <div class="row">
             <?php include 'components\list_group.php'; ?>

            <div class="col-md-9">
                <!-- Dashboard Overview -->
                <?php include 'components\dashboard_overview.php'; ?>



            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
