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
<?php require("db_info.php"); ?>
   <form action="update_db.php" method="POST">
     <div class="form-group">
       <label for="exampleInputEmail1">Book</label>
       <input type="text" name="book" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alma">
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
       <label for="exampleInputPassword1">Chapter</label>
       <input type="text" name="chapter" class="form-control" id="exampleInputPassword1" placeholder="32">
    </div>
    <div class="form-group">
       <label for="exampleInputPassword1">Verse</label>
       <input type="text" name="verse" class="form-control" id="exampleInputPassword1" placeholder="31">
    </div>
    <div class="form-group">
       <label for="exampleInputPassword1">Content</label>
       <textarea name="content" style="width: 600px;" placeholder="But behold, if ye will awake and arouse your faculties, even to an experiment upon my words, and exercise a particle of faith, yea, even if ye can no more than desire to believe, let this desire work in you, even until ye believe in a manner that ye can give place for a portion of my words."></textarea>
    </div>
    <?php 
        foreach ($db->query("SELECT name, id FROM topic") as $row) {
          $topic = $row['name'];
          $id = $row['id'];
          echo "<input type='checkbox' name='topic[]' value='$id'>$topic<br>";
        }
     ?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</body>
</html>