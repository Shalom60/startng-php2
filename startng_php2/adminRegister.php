<?php session_start();

?>

<!DOCTYPE html> 
<html>
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<title> Welcome to DevClub
	</title>
</head>

<body> 


	<div class="header"> 
        <div id="name">   </div>
		<div id="topmenu"> </div>
	




<div id="section">
	<h1>Admin Registeration </h1>
	
	<form action="regProcessAdmin.php" method="POST" id="form">
	<p> Please fill out the details bellow. All fields are required.</p>
	 <p1> <?php 
	
		
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
		echo "<span style='color:red;'>" . $_SESSION['error']. " </span>";
		session_destroy();
	}
	?><br> </p1>
	</p1>

	<p1><label>Name</label><br>
	<input type="text" name="firstname"  placeholder=" first name" >

	<input type="text" name="lastname" placeholder=" last name" ><br>
</p1>
	<p1><label>Email</label><br>
	<input type="text" name="email" placeholder="enter your email address"><br>
</p1> 
<p1>	<label>Password</label><br>
	<input type="text" name="pswrd" placeholder="set your password"><br>
</p1>
	
	
	<p1><label> Role</label><br>
    <select name="role" >
	<option value="">Select One</option>
		<option>Super Admin</option>
		<option>Admin 1</option>
		<option>Admin 2</option>
		<option>Admin 3</option>
</select> <br>
</p1>
<br> <p1><button type="submit"> <b>Register</b></button> </p1>

</form>
</div>

<div class="footer">
            
        </div>
   </body>

   </html>