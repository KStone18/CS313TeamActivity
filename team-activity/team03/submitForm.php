<!DOCTYPE HTML>
<html>
<head>
</head>  
<body>
   <p>Welcome <?php echo $_POST["name"]; ?><br>
   Your email address is: <a href="mailto:"><?php echo $_POST["email"]; ?></a></p>
   <p>Your major is: <?php echo $_POST["major"];  ?><br></p>
   <p>Your comment is: <?php echo $_POST["comments"]; ?> <br></p>
   <p>The countries you've been to:</p>
   <?php

      $countries = $_POST['country'];

      if(empty($countries))
      {

      echo("You didn't select any countries.");

      }
      else
      {
      $num = count($countries);

      echo("You selected $num countries: ");

      $abbrev = ["na" => "North America", "sa" => "South America", "eu"=>"Europe", "as" => "Asia", "au"=> "Australia", "af" => "Africa", "ant" => "Antarctica"];

      $i = 1;

      foreach ($countries as $country) {
         if ($i != $num) {
            echo $abbrev["$country"] . ", ";
         }
         else {
            echo $abbrev["$country"] . ".";  
         }
         ++$i;
      }

      }

   ?>
</body>
</html>