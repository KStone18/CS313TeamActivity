<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="/css/test.css" type="text/css">
		<title>test</title>
	</head>
	<body>
<p>This is a php page</p>
<?php

for ($i = 1; $i < 11; $i++) {
	$color;
	if($i%2)
		$color = "red";
	else
		$color = "blue";
	echo "<div id=\"div$i\" class=\"$color\">
		<p>This is div $i</p>
		</div>";
}

?>
	</body>
</html>
