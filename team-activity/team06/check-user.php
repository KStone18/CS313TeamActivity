<?php 
	require('db_info.php');
	session_start();

	$userName = htmlspecialchars($_POST["uName"]);
	$password = htmlspecialchars($_POST["psw"]);
	// echo "Your stuff: $userName $password";

	

	$isIN = false;

	//echo $userName . " " . $password;
	try {
		$query = 'SELECT id, username, password FROM ta07_users WHERE username=:username';
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $userName, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch();

		var_dump($row);
		echo  "This is the password: " . $row["password"];

		if (password_verify($password, $row['password'])) {
			echo "<h1>Welcome " . $row['username'] . "!</h1>";
		}
		else {
			echo "Invalid credentials";
		}
	}
	catch(Exception $ex) {
		echo "Failure to connect to database.";
	}
	   die();
?>