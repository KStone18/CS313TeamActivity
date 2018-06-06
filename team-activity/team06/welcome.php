<?php 
	require('db_info.php');
	session_start();	
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>Welcome!</title>
</head>
<body>
 <?php 
 	if (isset($_SESSION['user_Name'])) {
 		echo "<h1>Welcome ". $_SESSION['user_Name'] . "!</h1>";
 	}
 	else {
	       header("Location: signIn.php");			 		
 	} 
 ?>
 </body>
</html>