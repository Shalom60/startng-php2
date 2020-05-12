<?php 
include_once("lib/header.php");
require_once("functions/alert.php");
?>
   <div id="section">
	<h1>Register and join us at DevClub</h1>
	<link href="reg.css"  rel="stylesheet"/> 
	<form action="processReg.php" method="POST" id="form">
	<p> Please fill out the details bellow. All fields are required.</p>
	<p1> <?php
	 print_alert();
	
	?> </p1><br>
	<p1><label>First name</label><br>
	<input <?php
	if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){
		echo "value=" .$_SESSION['firstname'];
		$_SESSION['firstname']. "";
	}
	?>
	 type="text" name="firstname"  placeholder="enter your first name" ><br>
	</p1>
	<p1><label>Last name</label><br>
	<input  <?php
	if(isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])){
		echo  "value=" .$_SESSION['lastname'];
		$_SESSION['lastname']. "";
	}
	?>
	type="text" name="lastname" placeholder="enter your last name" ><br>
</p1>
	<p1><label>Email</label><br>
	<input <?php
	if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
		echo "value=" .$_SESSION['email'];
		$_SESSION['email']. "";
	}
	?>
	 type="text" name="email" placeholder="enter your email address"><br>
</p1> 
<p1>	<label>Password</label><br>
	<input type="text" name="pswrd" placeholder="set your password"><br>
</p1>
	<p1><label>Gender</label><br>
    <select name="gender" >
	
	<option value="">Select One</option> 
		<option  <?php
	if(isset($_SESSION['gender']) && $_SESSION['gender']== 'Female'){
		echo "selected";
	}
	?>
		>Female</option>
		<option <?php
	if(isset($_SESSION['gender']) && $_SESSION['gender']== 'Male'){
		echo "selected";
	}
	?>
		>Male</option>
	</select><br> 
</p1>
	<p1><label> Role</Section></label><br>
    <select  name="role" >
		<option value="">Select One</option>
		<option  <?php
	if(isset($_SESSION['role']) && $_SESSION['role']== 'Member'){
		echo "selected";
	}
	?>
		>Member</option>
		<option  <?php
	if(isset($_SESSION['role']) && $_SESSION['role']== 'Developer'){
		echo "selected";
	}
	?>
		>Developer </option>
	</select><br>
</p1>
	<p1><label> Department</label><br>
    <select name="catgry" >
		<option  <?php
	if(isset($_SESSION['catgry']) && $_SESSION['catgry']== 'Graphics Design'){
		echo "selected";
	}
	?> 
		>Graphics Design</option>
		<option  <?php
	if(isset($_SESSION['catgry']) && $_SESSION['catgry']== 'Web Development'){
		echo "selected";
	}
	?>
		>Web Development </option>
		<option  <?php
	if(isset($_SESSION['catgry']) && $_SESSION['catgry']== 'Mobile Development'){
		echo "selected";
	}
	?>
		>Mobile Development</option>
		<option  <?php
	if(isset($_SESSION['catgry']) && $_SESSION['catgry']== 'Hardware/Electronic Engineer'){
		echo "selected";
	}
	?>
		>Hardware/Electronic Engineer</option>
	</select><br>
</p1>
<br><button type="submit"> <b>Register</b></button>
</form>
</div>

	<?php
      include_once("lib/footer.php");
      ?>
