<?php session_start();

?>
<form action="loginProcessAdmin.php" method="POST">
	<h1>Login </h1>
    <p1> <?php
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
		echo  $_SESSION['message'] ;
		session_destroy();
    }
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
		echo "<span style='color:red;'>" . $_SESSION['error']. " </span>";
		session_destroy();
    }
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
		echo "<span style='color:red;'>" . $_SESSION['error']. " </span>";
		session_destroy();
	}
	?>
    </p1><br>
	<p1><label>Email</label><br>
    <input type="text" name="email" placeholder="enter your email address" ><br>
</p1>
<p1>	<label>Password</label><br>
	<input type="text" name="pswrd" placeholder="set your password"><br>
</p1>

<br><button type="submit">Login</button>

</form> <br>

     
      
      <a href="forgot.php" style="color: blue; border-bottom: transparent">  forgot password? </a>