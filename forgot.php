<?php include_once("lib/header.php");
require_once("functions/alert.php");
 ?>

<div id="section">


<h1> Forgot Password</h1>
	<link href="css/forgot.css"  rel="stylesheet"/> 
	<form action="processForgot.php" method="POST" id="form">
	<p> Please provide your email address.</p>
    <p1> <?php
    print_alert();
	
	?> </p1><br>
	
	<p1><label>Email</label><br>
	<input type="text" name="email" placeholder="enter your email address"><br>
</p1> 

<br><button type="submit"> <b>Send Reset Code</b></button>
</form>
</div>


