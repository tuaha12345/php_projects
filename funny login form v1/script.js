document.addEventListener("DOMContentLoaded", function() {
    const formImg = document.getElementById('formImg');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    emailInput.addEventListener('focus', function() {
        formImg.src = 'images/happy.png'; // Change to your desired image path
    });

    emailInput.addEventListener('blur', function() {
        formImg.src = 'images/see_above_right.png'; // Change back to original image or another image
    });

    emailInput.addEventListener('input', function() {
        if (emailInput.value.length > 0 && emailInput.value.length <= 7) {
            formImg.src = 'images/see_left.png'; // Change to your desired image path
        } 
        else if (emailInput.value.length > 7 && emailInput.value.length <= 27) {
            formImg.src = 'images/see_pass.png'; // Change to your desired image path
        }
        else if (emailInput.value.length >27  && emailInput.value.length <= 250) {
            formImg.src = 'images/see_right.png'; // Change to your desired image path
        }
        else {
            formImg.src = 'images/sad.png'; // Change back to original image or another image
        }
    });

    // password----------------------------------------------------

    passwordInput.addEventListener('focus', function() {
        formImg.src = 'images/see_left.png'; // Change to your desired image path
    });

    passwordInput.addEventListener('blur', function() {
        formImg.src = 'images/happy.png'; // Change back to original image or another image
    });

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.length > 0 && passwordInput.value.length <= 2) {
            formImg.src = 'images/see_left.png'; // Change to your desired image path
        } 
        else if (passwordInput.value.length > 2 && passwordInput.value.length <= 4) {
            formImg.src = 'images/wonder.png'; // Change to your desired image path
        } 
        else if (passwordInput.value.length > 4 ) {
            formImg.src = 'images/conver_with_hand2.png'; // Change to your desired image path
        } 
        else {
            formImg.src = 'images/sad.png'; // Change back to original image or another image
        }
    });






});
