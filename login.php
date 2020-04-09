<?php 

    include_once("lib/header.php")
?>
<link href="css/login.css"  rel="stylesheet"/>
    <form action="loginprocess.php" method="POST">
	<h1>Login to your account</h1>
    <p1> <?php
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
		echo  $_SESSION['message'] ;
		session_destroy();
    }
	if(isset($_SESSION['error3']) && !empty($_SESSION['error3'])){
		echo "<span style='color:red;'>" . $_SESSION['error3']. " </span>";
		session_destroy();
    }
    if(isset($_SESSION['error4']) && !empty($_SESSION['error4'])){
		echo "<span style='color:red;'>" . $_SESSION['error4']. " </span>";
		session_destroy();
	}
	?>
    </p1><br>
	<p1><label>Email</label><br>
    <input <?php	
            if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
		echo $_SESSION['email'];
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