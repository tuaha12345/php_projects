<?php

include '../inc/connect.php';



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'studysolution2023@gmail.com';   //SMTP write your email
    $mail->Password   = 'cugdzjinwxfgtnye';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name

    // $mail->addAddress('s@gmail.com');     //Add a recipient email  

    //$select_query="SELECT * FROM remainder";

    // please uncomment this when project is full ready
     $select_query="SELECT * FROM remainder WHERE approve = 'yes' AND return_date < DATE_ADD(NOW(), INTERVAL 3 DAY)"; 

    $result_query=mysqli_query($db,$select_query);

           while ($row_data = mysqli_fetch_assoc($result_query)) {
    $mail->addAddress($row_data["email"]); // replace "column_name" with the actual column name from your database
}

    

     $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["subject"];   // email subject headings
    $mail->Body    = $_POST["message"]; //email message
      
    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = '../index.php';
    </script>
    ";
}