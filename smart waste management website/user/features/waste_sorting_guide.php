<?php
include '../db.php'; // Include the database connection
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- *************** boostrap & others link *************** -->
    <?php  include '../../components/boostrap_link.php'; ?>
    <title>Waste Sorting Guide</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
        <?php include '../../css/user/waste_sorting_guide.css'; ?>
    </style>
</head>
<body>
          <!-- *************** navbar *************** -->
          <?php 
          include '../../components/feature_navbar.php';
           ?>    
    <div class="container guide-container ">
        <h2 class="guide-title">Waste Sorting Guide</h2>

        <!-- General Waste Sorting Guide -->
        <div class="row waste-type">
            <div class="col-md-4">
                <img src="../images/general_waste.png " alt="General Waste" class="img-fluid " height="250px" width="250px">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>General Waste</h4>
                        <p>General waste includes non-recyclable materials such as plastic bags, diapers, and food wrappers. These should be disposed of in the general waste bin.</p>
                        <div class="tips">
                            <strong>Tip:</strong> Avoid placing recyclables or compostable items in this bin. Items in general waste typically go to landfills.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recycling Guide -->
        <div class="row waste-type">
            <div class="col-md-4">
                <img src="../images/recycling.png" alt="Recycling Waste" class="img-fluid" height="250px" width="250px">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Recycling</h4>
                        <p>Recyclable materials include paper, cardboard, plastic bottles, and glass containers. Ensure these items are clean and dry before placing them in the recycling bin.</p>
                        <div class="tips">
                            <strong>Tip:</strong> Rinse out containers to remove food residue. Contaminated recyclables can spoil the entire batch.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compost Guide -->
        <div class="row waste-type">
            <div class="col-md-4">
                <img src="../images/compost.png" alt="Compost Waste" class="img-fluid" height="250px" width="250px">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Compost</h4>
                        <p>Compostable waste includes food scraps, fruit peels, and garden waste. These materials should be placed in a compost bin for organic recycling.</p>
                        <div class="tips">
                            <strong>Tip:</strong> Composting reduces landfill waste and produces nutrient-rich soil for gardening.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hazardous Waste Guide (Added as an enhancement) -->
        <div class="row waste-type">
            <div class="col-md-4">
                <img src="../images/hazardous_waste.jpg" alt="Hazardous Waste" class="img-fluid" height="250px" width="250px">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Hazardous Waste</h4>
                        <p>Hazardous waste includes batteries, chemicals, and electronic waste. These materials require special disposal procedures to prevent environmental harm.</p>
                        <div class="tips">
                            <strong>Tip:</strong> Check with your local waste authority for the proper disposal of hazardous materials. Never throw them in regular bins.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   <!--------- footer----------->
   <?php include '../../components/footer.php'; ?>

    <script src="../js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>
