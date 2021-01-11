<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));

if(isset($_POST['submit'])) {
$email = $_POST['email'];
$password = $_POST['password'];

if($email == "" || $password == "")
{
	if($email == "")
	  {
	  	$error_email = "<span style='color: red;'>*Required</span>";
	  }
	if($password == "")
	  {
	  	$error_password = "<span style='color: red;'>*Required</span>";
	  }
	header("location: login.php?error_email=".$error_email."&error_password=".$error_password);
}
else
{

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

if(mysqli_num_rows($result))
{
$row = mysqli_fetch_assoc($result);
$id= $row['id'];
header("location:../frontend/homePage.php?id=".$id);
}
else
{
    $error = "<div style='color: red;'>*Invalid email or password</div>";
	header("location:../frontend/login.php?errormsg=".$error);
}
}
}


?>
