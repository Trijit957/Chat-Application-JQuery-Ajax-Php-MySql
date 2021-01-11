<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));

if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$contact = $_POST['contact'];

if($name == "" || $email == "" || $password == "" || $contact == "")
{
	if($name == "")
	  {
	  	$error_name = "<span style='color: red;'>*Required</span>";
	  }
	if($email == "")
	  {
	  	$error_email = "<span style='color: red;'>*Required</span>";
	  }
	if($password == "")
	  {
	  	$error_password = "<span style='color: red;'>*Required</span>";
	  }
	if($contact == "")
	  {
	  	$error_contact = "<span style='color: red;'>*Required</span>";
	  }
	header("location: signup.php?error_name=".$error_name."&error_email=".$error_email."&error_password=".$error_password."&error_contact=".$error_contact);
}
else
{
$check_email = "SELECT * FROM users WHERE email = '$email'";

$result_check_email = mysqli_query($connection,$check_email);

if(!mysqli_num_rows($result_check_email)) {

$query = "INSERT INTO users(name,email,password,contact) VALUES('$name','$email','$password','$contact')";
$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

    $id= mysqli_insert_id($connection);
    header("location:../frontend/homepage.php?id=".$id);
}
else
{
    $error = "<div style='color: red;'>*Email id already exists</div>";
	header("location:../frontend/signup.php?errormsg=".$error);
}
}
}


?>
