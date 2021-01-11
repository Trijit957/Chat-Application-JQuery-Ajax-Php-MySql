<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/index.css">
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
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-7 col-xs-12" id="text">
        			<p class="title">Join us</p>
        			<p class="sub-title">To stay connected with everyone.....</p>
        			<div class="content">
        				<div class="col-md-3 col-md-offset-2 col-xs-12" id="button">
        				    <a href="login.php" class="btn btn-primary btn-block">Login</a>
        				</div>
        				<div class="col-md-3 col-md-offset-2 col-xs-12">
        				    <a href="signup.php" class="btn btn-primary btn-block">Signup</a>
        			    </div>
        		    </div>
        		</div>
        		<div class="col-md-5 hidden-xs">
        		   <img src="https://chatwee.com/public/images/header-image.png" alt="pic">
        		</div>
        	</div>
        </div>
</body>
</html>
