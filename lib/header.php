<!DOCTYPE html> 
<html>
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css"  rel="stylesheet"/> 
	<title> Welcome to DevClub
	</title>
</head>

<body> 
<?php session_start();

?> 


	<div class="header"> 
        <div id="name"> <a href="index.php">DevClub</a>  </div>
		<div id="topmenu"> 
		<?php	if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])){?>
			
			  <a href="logout.php">Logout</a> | <a href="reset.php">Reset Password</a>
			  <?php 

?> 

		<?php } else{?>
	
         <a href="reg.php">Register</a> | <a href="login.php">Login</a> 
		 <?php 

?> 
 <?php } ?> 
		 </div>
		</div>
		
		
