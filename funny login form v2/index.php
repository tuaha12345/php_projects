<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Rocket Fire Effect</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Prevent the page from scrolling */
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
            position: fixed; /* Fixed to make centering easier */
            left: 50%; /* Start positioning from the middle of the screen */
            top: 50%;
            transform: translate(-50%, -50%); /* Center it properly */
            transition: all 0.3s ease; /* Smooth movement */
        }

        .login-container h2 {

            margin-bottom: 20px;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .funny-message {
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        /* Rocket fire effect */
        .fire {
            position: absolute;
            width: 40px; /* Wider flames */
            height: 100px; /* Taller flames */
            background: radial-gradient(circle at 50% 0%, rgba(255,165,0,0.8), rgba(255,69,0,0.6), rgba(255,0,0,0.4), transparent 70%);
            bottom: -120px;
            display: none;
        }

        .fire.left {
            left: 40px;
        }

        .fire.right {
            right: 40px;
        }

        /* Animation for intense flickering fire */
        @keyframes rocketFlicker {
            0% {
                transform: scaleY(1);
                opacity: 1;
            }
            30% {
                transform: scaleY(1.3);
                opacity: 0.85;
            }
            60% {
                transform: scaleY(1.5);
                opacity: 0.7;
            }
            100% {
                transform: scaleY(1);
                opacity: 1;
            }
        }

        /* Flickering effect for the fire */
        .fire.moving {
            display: block;
            animation: rocketFlicker 0.3s ease-in-out infinite;
        }
    </style>
</head>
<body>

    <div class="login-container" id="loginContainer">
        <h2>Login Here</h2>
        <form id="loginForm">
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <input type="submit" value="Login" id="submitBtn">
        </form>
        <div class="error-message" id="errorMessage"></div>
        <div class="funny-message" id="funnyMessage"></div>

        <!-- Fire effects -->
        <div class="fire left" id="leftFire"></div>
        <div class="fire right" id="rightFire"></div>
    </div>

    <script>
        const correctPassword = "12345"; // Set the correct password here
        let attempts = 0;
        const maxAttempts = 3;
        const lockoutTime = 10000; // 10 seconds lockout time
        let lockoutActive = false; // Lockout flag
        let timer; // Timer for lockout

        const loginContainer = document.getElementById("loginContainer");
        const errorMessage = document.getElementById("errorMessage");
        const funnyMessage = document.getElementById("funnyMessage");
        const leftFire = document.getElementById("leftFire");
        const rightFire = document.getElementById("rightFire");

        // Store initial position of the form
        document.addEventListener("DOMContentLoaded", () => {
            centerForm(); // Position the form in the center initially
        });

        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting

            if (lockoutActive) {
                moveFormRandomly(); // Move form if lockout is active
                errorMessage.textContent = "You must wait for 10 seconds before retrying!";
                return;
            }

            const password = document.getElementById("password").value;

            if (password === correctPassword) {
                errorMessage.textContent = "Login successful!";
                funnyMessage.textContent = "";
                attempts = 0; // Reset attempts on successful login
            } else {
                attempts++;
                errorMessage.textContent = `Incorrect password. Attempt ${attempts} of ${maxAttempts}.`;

                if (attempts >= maxAttempts && attempts<maxAttempts+1) {
                    funnyMessage.textContent = "Too many attempts. Please wait 10 seconds!";
                    //lockoutActive = true;
                    //startLockout();
                }
                else if(attempts >= maxAttempts+1){
                    funnyMessage.textContent = "Oops! You've been trying too hard! 😅 Take a break!";
                    lockoutActive = true;
                    startLockout();
                }
                else {
                    funnyMessage.textContent = "Forgot your password? Oops, that's funny!";
                }
            }
        });

        function startLockout() {
            errorMessage.textContent = "Too many attempts. The form will move for 10 seconds.";
        

            // Start moving the form
            showFire(); // Show and animate the fire
            timer = setInterval(moveFormRandomly, 50); // Move every 500ms during lockout
            
            // Lockout timer to stop the movement after 10 seconds
            setTimeout(() => {
                lockoutActive = false; // Reset lockout after time expires
                clearInterval(timer); // Stop moving the form
                errorMessage.textContent = "";
                attempts = 0; // Reset attempts
                centerForm(); // Reset form position to the center
                hideFire(); // Hide the fire effect
            }, lockoutTime);
        }

        // Function to move the form randomly
        // function moveFormRandomly() {
        //     const maxX = window.innerWidth - loginContainer.offsetWidth;
        //     const maxY = window.innerHeight - loginContainer.offsetHeight;
        //     const randomX = Math.floor(Math.random() * maxX);
        //     const randomY = Math.floor(Math.random() * maxY);

        //     loginContainer.style.transform = `translate(${randomX}px, ${randomY}px)`;
        // }
        // Function to move the form randomly in all directions
function moveFormRandomly() {
    const maxX = window.innerWidth - loginContainer.offsetWidth;
    const maxY = window.innerHeight - loginContainer.offsetHeight;

    // Calculate random X and Y positions (including negative values)
    const randomX = Math.floor(Math.random() * maxX * 2) - maxX; // Random X from -maxX to +maxX
    const randomY = Math.floor(Math.random() * maxY * 1) - maxY; // Random Y from -maxY to +maxY

    loginContainer.style.transform = `translate(${randomX}px, ${randomY}px)`;
}


        // Function to center the form in the viewport
        function centerForm() {
            loginContainer.style.left = '50%';
            loginContainer.style.top = '50%';
            loginContainer.style.transform = 'translate(-50%, -50%)'; // Center based on width/height
        }

        // Show the fire and start flickering
        function showFire() {
            leftFire.style.display = 'block';
            rightFire.style.display = 'block';
            leftFire.classList.add('moving');
            rightFire.classList.add('moving');
        }

        // Hide the fire and stop flickering
        function hideFire() {
            leftFire.style.display = 'none';
            rightFire.style.display = 'none';
            leftFire.classList.remove('moving');
            rightFire.classList.remove('moving');
        }

        // Move form on hover when lockout is active
        loginContainer.addEventListener("mouseenter", () => {
            if (lockoutActive) {
                moveFormRandomly();
            }
        });

    </script>

</body>
</html>
