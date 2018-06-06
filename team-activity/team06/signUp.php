<?php 
	require('db_info.php');
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="team-css.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="login.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="pro.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

<title> Data Collection </title>
</head>
<body>

 <form action="register-user.php" method="post" style="border:1px solid #ccc">

	<div class="containerSign">

		 <h1>Sign Up</h1>
		 <p>Please fill in this form to create an account.</p>
		 <hr>      
		 <label for="Username"><b>Username</b></label>
		 <input type="text" placeholder="Enter Username" name="uName" required><br>		       
		 <label for="psw"><b>Password</b></label>
		 <input type="password" placeholder="Enter Password" name="psw" required><br>      
		 <label for="psw-repeat"><b>Repeat Password</b></label>
		 <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br>
		 <label>
		   <input type="checkbox" checked="checked" name="remember" style=“margin-bottom:15px”> Remember me
		 </label>
       <button type="submit" class="btn btn-primary btn-md signupbtn">Sign Up</button> 
	</div>

 </form>

 </body>
</html>