<?php

$conn = mysqli_connect('localhost','root','','admin');

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $plan = $_POST['plan'];
   $address = $_POST['address'];
   $message = $_POST['message'];

   $insert = "INSERT INTO `admin`(`name`, `email`, `number`, `plan`, `address`, `message`) VALUES ('$name','$email','$number','$plan','$address','$message')";

   mysqli_query($conn, $insert);

   header('location:contact.php');

}


if(isset($_POST['del']))
{    
     $id = $_POST['id'];
   
     
     $sql = "DELETE FROM admin WHERE id='$id'";
     if (mysqli_query($conn, $sql)) {
        echo "<h1>Deleted is successfully !</h1>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>