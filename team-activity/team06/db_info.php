<?php 
	$dbUrl = getenv('HEROKU_POSTGRESQL_AMBER_URL');		
	if (empty($dbUrl)) {
		$dbUrl = "postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95";
	}
	$dbopts = parse_url($dbUrl);		
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	try
	{
 		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);			
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	}
	catch(PDOException $ex) {
		echo "<p>Error: " . $ex->getMessage() . "</p><br>";
		die();
	}
?>
