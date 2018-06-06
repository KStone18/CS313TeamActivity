<?php 
	require('db_info.php');
	session_start();	
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>

    Profile

</title>

 <?php include('headerA.php');?>





 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="dataForm" >

   <div class="containerSign">

     <h1>Search database</h1>

     <p>Please fill in this form to search for information.</p>

   



     <div class="clearfix">

       <!-- <button type="button" class="btn btn-primary btn-md cancelbtn">Cancel</button> -->

       <button type="submit" class="btn btn-primary btn-md signupbtn">Search</button>  

     

     </div>

   </div>

 </form>