<?php 
	require('db_info.php');
	session_start();

	$userName = htmlspecialchars($_POST["uName"]);
	$password = htmlspecialchars($_POST["psw"]);

	$isIN = false;

	try {
		$query = 'SELECT id, username, password FROM ta07_users WHERE username=:username';
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $userName, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch();

		if (password_verify($password, $row['password'])) {
	       $_SESSION["user_Name"] = $userName;								
	       	header("Location: welcome.php");			
		}
		else {
			echo "<p>Invalid credentials</p>";
		}
	}
	catch(Exception $ex) {
		echo "Failure to connect to database.";
	}
	   die();
?>