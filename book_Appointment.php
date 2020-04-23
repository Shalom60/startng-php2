<?php
include_once("lib/header.php");
require_once("functions/alert.php");

?>
<div id="section">
<h1>Book Appointment</h1>
	<link href="css/book_appoint.css"  rel="stylesheet"/> 
	<form action="process_book_appointment.php" method="POST">
	<p> Please fill out the details bellow. All fields are required.</p>
	<p1> <?php
	 print_alert();
	
	?> </p1><br>
	<p1><label>Date of appointment</label><br>
    <input 	<?php if(isset($_SESSION['date']) && !empty($_SESSION['date'])){
		echo "value=" .$_SESSION['date'];
		$_SESSION['date']. "";
		
	}
	?>
     type="text" name="date" placeholder="DD/MM/Y"><br>
	</p1> 
    <br>	<p1><label>Time of appointment</label><br>
    <input 	<?php if(isset($_SESSION['time']) && !empty($_SESSION['time'])){
		echo "value=" .$_SESSION['time'];
		$_SESSION['time']. "";
		
	}
	?>
    	type="text" name="time" placeholder=" from the hours of 9am-4pm" ><br>
</p1>
<br>	<p1><label>Nature of appointment</label><br>
    <input 	<?php if(isset($_SESSION['nature']) && !empty($_SESSION['nature'])){
		echo "value=" .$_SESSION['nature'];
		$_SESSION['nature']. "";
	
	}
	?>
    	 type="text" name="nature" placeholder="E.g logo design" ><br>
</p1> 
<br> <p1><label> Initial Complaint</label><br>
 <textarea 	<?php if(isset($_SESSION['initial_complaint']) && !empty($_SESSION['initial_complaint'])){
		echo "value=" .$_SESSION['initial_complaint'];
		$_SESSION['initial_complaint']. "";
		
	}
    ?>  name="initial_complaint" > </textarea> 
    </p> <br>
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
		>Mobile development</option>
		<option  <?php
	if(isset($_SESSION['catgry']) && $_SESSION['catgry']== 'Hardware/Electronic Engineer'){
		echo "selected";
	}
	?>
		>Hardware/Electronic Engineer</option>
	</select><br>
</p1>
<br><button type="submit"> <b>Send</b></button>
</form>


</div>




<?php
include_once("lib/footer.php");
?>