<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/boostrap_link.php'; ?>
    <title>Smart Waste Management System</title>
    <link href="css/index.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="user/images/favicon.png">


</head>
<body>
    <?php
    // Start session to check if the user is logged in
    session_start();
    ?>
      <!-- *************** navbar *************** -->
    <?php 
          include 'components/navbar.php';
    ?>

    

    <header class="hero text-center">
        <div class="container">
            <h1 class="display-4">Smart Waste Management System</h1><hr>
            <p class="lead">Efficient, eco-friendly waste management solutions for a cleaner tomorrow.</p>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="user/register.php" class="btn btn-success btn-lg mt-3">Get Started</a>
            <?php endif; ?>
        </div>
    </header>

    <!----------------------------- slider------------------------------->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://www.trinetrawireless.com/wp-content/uploads/2020/01/Door-to-Door-Garbage-Collecting-System-made-efficient-via-Trinetra%E2%80%99s-software.jpg" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-dark fw-bolder">Efficient Waste Collection</h1>
                <p class="text-dark fw-bolder">Our smart waste management system ensures timely and efficient waste collection from your doorstep.
                     Say goodbye to missed pickups and overflowing bins with our automated service reminders.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://ecofriend.org/wp-content/uploads/2022/03/Important-Eco-friendly-Methods-of-Waste-Disposal.jpg" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white fw-bolder">Eco-friendly Disposal Solutions</h1>
                <p class="text-white fw-bolder">We are committed to promoting sustainable practices by offering eco-friendly disposal solutions. 
                    Join us in recycling and managing waste responsibly for a greener future.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://media.licdn.com/dms/image/v2/C5112AQHfbj9Uve3J2Q/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1533013630671?e=1732752000&v=beta&t=ZY3ba95FFoQuu0x7WeNGnHTFg7M3kusscBEraivucLQ" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white fw-bolder">Smart Waste Tracking</h1>
                <p class="text-white fw-bolder">Track your waste pickups, manage special requests, and monitor recycling progress—all in one place. 
                    Stay informed and take control of your waste management with our easy-to-use platform.
                </p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--------------------------------------- main ---------------------- >
    
    <main class="container my-5">
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Welcome back!</h4>
                <p>Ready to manage your waste efficiently? Visit your dashboard to access all features.</p>
                <hr>
                <a href="user/dashboard.php" class="btn btn-success">Go to Dashboard</a>
            </div>
        <?php endif; ?>
           <!--------------------------- Subscriptions check ---------------------->

        <?php 
        include 'db.php';  // Include the DB connection
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            

            // Write the query directly
            $sql = "SELECT end_date FROM Subscription WHERE user_id = $user_id  ";
            
            // Execute the query
            $result = mysqli_query($conn, $sql);
            
            // Check if there is a result
            if (mysqli_num_rows($result) > 0) {
                // Fetch the end_date
                $row = mysqli_fetch_assoc($result);
                $end_date = $row['end_date'];
                $current_date = new DateTime();  // Current date
                $end_date = new DateTime($end_date);  // End date
                $interval = $current_date->diff($end_date);
                
                if ($current_date > $end_date) {
                    // User has expired subscription
                    $_SESSION['subscription_plan'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['smart_notifications'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['Waste_Sorting_Guide'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['rewards_program'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['special_pickups'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['feedback_system'] = 'user/features/subscription_plans_update.php';
                    
                    echo " 
                    <div class='alert alert-danger' role='alert'>
                    Your subscription has expired. Please update your subscription.
                    </div>";
                } 
                elseif ($interval->days <= 3 && !$interval->invert) {
                    // 3 or fewer days left until expiration
                    $_SESSION['subscription_plan'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['smart_notifications'] = 'user/features/smart_notifications.php';
                    $_SESSION['Waste_Sorting_Guide'] = 'user/features/waste_sorting_guide.php';
                    $_SESSION['rewards_program'] = 'user/features/rewards_program.php';
                    $_SESSION['special_pickups'] = 'user/features/special_pickups.php';
                    $_SESSION['feedback_system'] = 'user/features/feedback.php';
                    //$_SESSION['subscription_plan'] = 'subscription.php';
                    echo " 
                    <div class='alert alert-warning' role='alert'>
                    Your subscription will expire in $interval->days days.
                    </div>";
                                        
                }
                else {
                    $_SESSION['subscription_plan'] = 'user/features/subscription_plans_update.php';
                    $_SESSION['smart_notifications'] = 'user/features/smart_notifications.php';
                    $_SESSION['Waste_Sorting_Guide'] = 'user/features/waste_sorting_guide.php';
                    $_SESSION['rewards_program'] = 'user/features/rewards_program.php';
                    $_SESSION['special_pickups'] = 'user/features/special_pickups.php';
                    $_SESSION['feedback_system'] = 'user/features/feedback.php';
                    // User has active subscription
                    //echo "Your subscription is active. You can manage your waste efficiently.";
                }
                
            } 
            else {
                // User has no subscription
                $_SESSION['subscription_plan'] = 'user/features/subscription_plans.php';
                $_SESSION['smart_notifications'] = 'user/features/subscription_plans.php';
                $_SESSION['Waste_Sorting_Guide'] = 'user/features/subscription_plans.php';
                $_SESSION['rewards_program'] = 'user/features/subscription_plans.php';
                $_SESSION['special_pickups'] = 'user/features/subscription_plans.php';
                $_SESSION['feedback_system'] = 'user/features/subscription_plans.php';
            }
        }
         // -------- when user not logged in -------
        else{
            $_SESSION['subscription_plan'] = 'user/login.php';
            $_SESSION['smart_notifications'] = 'user/login.php';
            $_SESSION['Waste_Sorting_Guide'] ='user/login.php';
            $_SESSION['rewards_program'] = 'user/login.php';
            $_SESSION['special_pickups'] = 'user/login.php';
            $_SESSION['feedback_system'] = 'user/login.php';
        }
         
          
          // Close the connection
          mysqli_close($conn);
        ?>

        <section id="features" class="row g-4 py-5">
            <h2 class="text-center mb-5">Our Features</h2>
            <div class="col-md-4">
                <div class="text-center"> 
                <a href="<?php echo $_SESSION['subscription_plan']; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-calendar-alt feature-icon"></i>
                    <h3>Subscription Plans</h3>
                    <p>Choose from our flexible monthly waste management plans.</p>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                <a href="<?php echo $_SESSION['smart_notifications']; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-bell feature-icon"></i>
                    <h3>Smart Notifications</h3>
                    <p>Get timely alerts for waste collection based on your location and waste type.</p>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                <a href="<?php echo $_SESSION['Waste_Sorting_Guide']; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-sort feature-icon"></i>
                    <h3>Waste Sorting Guide</h3>
                    <p>Learn how to sort your waste correctly with our detailed guide.</p>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                <a href="<?php echo $_SESSION['rewards_program']; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-trophy feature-icon"></i>
                    <h3>Rewards Program</h3>
                    <p>Earn points for responsible waste management and compete on our leaderboard.</p>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                <a href="<?php echo $_SESSION['special_pickups']; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-truck feature-icon"></i>
                    <h3>Special Pickups</h3>
                    <p>Request pickups for bulk or hazardous materials with ease.</p>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                <a href="<?php echo $_SESSION['feedback_system'] ; ?> " class="text-decoration-none text-dark">
                    <i class="fas fa-comments feature-icon"></i>
                    <h3>Feedback System</h3>
                    <p>Share your experience or report issues to help us improve our service.</p>
                </a>
                </div>
            </div>
        </section>
    </main>

   <!--------- footer----------->
   <?php include 'components/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>