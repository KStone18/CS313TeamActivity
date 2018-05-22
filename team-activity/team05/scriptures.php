<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <title>Scripture Resources</title> 
</head>
<body>
   <h1>Scripture Resources</h1>
   <?php 
         $book = "";
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $book = test_input($_POST["book"]);
            echo "<p>HERE IS THE BOOK: $book</p>";
         }

         function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
         }

      ?>
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

         foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
            echo "<p><strong>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</strong> - \"" . $row['content'] . "\"</p><br>";
         }
      }
      catch(PDOException $ex) {
         echo "<p>Error: " . $ex->getMessage() . "</p><br>";
         die();
      }

      
      
   ?>
   <div class="container">

    <h2>Select Book</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <div class="form-group">
        <select name="book" class="form-control" id="sel1">
        <?php 
            foreach ($db->query('SELECT DISTINCT book FROM scripture') as $row) {
               echo "<option>" . $row['book'] . "</option>";
            } 
         ?>          
        </select>
        <br>
      </div>
      <input type="submit" name="submit" value="submit"/>
    </form>
    <?php
         $stmt = $db->prepare('SELECT book, chapter, verse, content FROM scripture WHERE book=:book');
         $stmt->execute(array(':book' => $book));
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($rows as $row) {
            echo "<p><strong>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</strong> - \"" . $row['content'] . "\"</p><br>";
            
         }
      ?>

   </div>
</body>
</html>