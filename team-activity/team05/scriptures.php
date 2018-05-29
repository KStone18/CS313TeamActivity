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
   <?php require("db_info.php");
   ?>
   <div class="container">

   <?php 
      foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
            echo "<p><strong>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</strong> - \"" . $row['content'] . "\"</p><br>";
         }
    ?>

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