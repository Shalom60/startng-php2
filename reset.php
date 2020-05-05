<?php include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/user.php");
     
if(!is_user_loggedin() && !is_token_set()){
  set_alert("error", "You are not authorised to view that page") ;
  header("Location: login.php");
  die();
}

?>
<link href="css/reset.css"  rel="stylesheet"/> 

<div id="section">


<h1> Reset Password</h1>
	
	<form action="processReset.php" method="POST" id="form">
	<p> Password associated with your account: [email].</p>
    <p1> <?php
   
   print_alert();

    ?>
    </p1><br>
    <?php
     if(!is_user_loggedin()){?>
    <input 
    <?php
       if(isset($_SESSION['token'])){
         echo "value=" .$_SESSION['token']. "";
       } else{
         echo "value=" .$_GET['token']. "";
       }
        ?>
    
     type="hidden"  name="token"/>
      <?php }?>
	<p1><label>Email</label><br>
	<input  <?php
        if(isset($_SESSION['email'])){
       echo "value=" . $_SESSION['email']. "";
        }

        ?>
    
    type="text" name="email" placeholder="Email"><br>
</p1> 

<p1>	<label> Enter New Password</label><br>
	<input type="text" name="pswrd" placeholder="set your password"><br>
</p1>

<br><button type="submit"> <b>Reset Password</b></button>
</form>
</div>


