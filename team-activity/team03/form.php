<!DOCTYPE HTML>
<html>
<head>
   <script>
      
   </script>
</head>  
<body>

   <form action="submitForm.php" method="post" onsubmit="">
      Name: <input type="text" name="name"><br>
      E-mail: <input type="text" name="email"><br>

      <div style="width: 100%;">
         <p>Major:</p>
         <?php
            $majors = ["Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering"];

            foreach ($majors as $major) {
               echo "<input type=\"radio\" name=\"major\" value=\"$major\">$major";
            }


          ?>
      </div>
      <div style="width: 100%;">
         <p>Comments:</p>
         <textarea name="comments" placeholder="Enter your comment here"></textarea>
      </div>

      <div>
         <p>Enter the continents you have visited:</p>
         <?php 
            $abbrev = ["na" => "North America", "sa" => "South America", "eu"=>"Europe", "as" => "Asia", "au"=> "Australia", "af" => "Africa", "ant" => "Antarctica"];
            foreach ($abbrev as $key => $value) {
               echo "<input type=\"checkbox\" name=\"country[]\" value=\"$key\">$value";
            }

         ?>
         <!-- <input type="checkbox" name="country[]" value="North America">North America
         <input type="checkbox" name="country[]" value="South America">South America
         <input type="checkbox" name="country[]" value="Europe">Europe
         <input type="checkbox" name="country[]" value="Asia">Asia
         <input type="checkbox" name="country[]" value="Australia">Austrailia
         <input type="checkbox" name="country[]" value="Africa">Africa
         <input type="checkbox" name="country[]" value="Antarctica">Antarctica -->
      </div>
      <input type="submit">
   </form>

</body>
</html>