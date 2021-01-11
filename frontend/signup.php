<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatterbox</title>
</head>
<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
           <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" id="nav-left">ChatterBox</a>
           </div>
           <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="contact_us.php" id="nav-right"><span class="glyphicon glyphicon-contact"></span> Contact Us</a></li>
                <li><a href="about_us.php" id="nav-right"><span class="glyphicon glyphicon-users"></span> About Us</a></li>
            </ul>
           </div>
         </div>
        </nav>
        <div class="container-fluid" id="text">
        	<div class="row">
        		<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
        		<form action="../frontend/signup_script.php" method="POST" autocomplete="off" class="jumbotron">
                <p style="font-size: 40px; font-weight: bold;">SIGN UP</p>
                <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name">
                <?php
                  if(isset($_GET['error_name']))
                    {
                     echo $_GET['error_name'];
                    }
                ?>
                </div>
                <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <?php
                    if(isset($_GET['error_email']))
                    {
                        echo $_GET['error_email'];
                    }
                ?>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{6,}">
                <?php
                 if(isset($_GET['error_password'])) {
                     echo $_GET['error_password'];
                 }
                 if(isset($_GET['errormsg'])) {
                     echo $_GET['errormsg'];
                 }
                ?>
                </div>
                <div class="form-group">
                <input type="number" class="form-control" name="contact" placeholder="Contact">
                <?php
                 if(isset($_GET['error_contact'])) {
                     echo $_GET['error_contact'];
                 }
                ?>
                </div>
                <div class="form-group">
                <button class="btn btn-primary btn-lg" name="submit" type="submit">Submit</button>
                </div>
                </form>
        		</div>
        	</div>
        </div>
</body>
</html>
