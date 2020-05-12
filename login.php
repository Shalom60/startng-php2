<?php  include_once("lib/header.php");

require_once("functions/alert.php");
require_once("functions/user.php");
?>
<link href="login.css"  rel="stylesheet"/>
    <form action="processLogin.php" method="POST">
	<h1>Login to your account</h1>
    <p1> <?php

print_alert();
	?>
    </p1><br>
	<p1><label>Email</label><br>
    <input <?php	
            if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
				echo "value=" .$_SESSION['email'];
				$_SESSION['email']. "";
    
	} ?>
     type="text" name="email" placeholder="enter your email address" ><br>
</p1>
<p1>	<label>Password</label><br>
	<input type="text" name="pswrd" placeholder="set your password"><br>
</p1>
<br><button type="submit">Login</button>

</form> <br>

     
      
      <a href="forgot.php" style="color: blue; border-bottom: transparent">  forgot password? </a>
 
	<?php
    include_once("lib/footer.php")
  ?>
