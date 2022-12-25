

<!DOCTYPE html>
<html>
<head>
<title>Admin page Title</title>
</head>
<body style="background-color: #ceddf5;">

<h1 style="color: red;font-family: cursive;font-size: 67px;">Permission denied to access</h1>


<script>
 var pass = prompt("Enter your password:");

if(pass=="12345")
{
  window.location = 'show.php';
}
else{
  alert("Sorry! password is not correct");
}



</script>




</body>
</html>