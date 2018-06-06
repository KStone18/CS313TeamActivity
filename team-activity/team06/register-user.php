<?php 
	require('db_info.php');
	session_start();

	$userName = htmlspecialchars($_POST["uName"]);

	$password = htmlspecialchars($_POST["psw"]);

	$rptPassword = htmlspecialchars($_POST["psw-repeat"]);
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);

	if ($password != $rptPassword) {
	    $_SESSION["message"] = "Passwords do not Match";
	    header("Location: home.php");
	}

	$isIN = false;

	//echo $userName . " " . $password;

	 foreach ($db->query('SELECT id, username, password FROM ta07_users') as $row) {
	    //echo $row["username"] . " " . $row["password"];  
	   if ($userName == $row["username"] && $password == $row["password"])
	   {
	       $_SESSION["messageL"] = "You have an account already. Please login";
	       header("Location: login.php");
	       $isIN = true;
	       break;
	   }
	}

	   if(!$isIn)

	   {    
	       $query = "INSERT INTO ta07_users (username, password) VALUES (:username, :password)";
	       $statement = $db->prepare($query);
	       $statement->bindValue(":username", $userName, PDO::PARAM_STR);
	       $statement->bindValue(":password", $hashPassword, PDO::PARAM_STR);
	       $statement->execute();

	       $_SESSION["user_Name"] = $userName;


	       $_SESSION["id"] = $db->lastInsertId('ta07_users_id_seq');

	       // echo $_SESSION["id"];
	       header("Location: welcome.php");
	       // echo "<h1>Done!</h1>";
	         break;
	   }
	   die();
?>