<?php session_start();
require_once("functions/alert.php");
require_once("functions/user.php");

// // collecting, verifying and validating data
$errorCount = 0;

$date = $_POST['date'] != ""? $_POST['date'] : $errorCount++ ;
$time = $_POST['time'] != ""? $_POST['time'] : $errorCount++ ;
$nature = $_POST['nature'] != ""? $_POST['nature'] : $errorCount++ ;
$initial_complaint = $_POST['initial_complaint'] != ""? $_POST['initial_complaint'] : $errorCount++ ;
$catgry = $_POST['catgry'] != ""? $_POST['catgry'] : $errorCount++ ;



$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['nature'] = $nature;
$_SESSION['initial_complaint'] = $initial_complaint;
$_SESSION['catgry'] = $catgry;
  $email = $_SESSION['email'];
 $fullname=  $_SESSION['fullName'];

if($errorCount > 0){
	set_alert("error", "You have ". $errorCount . " blank space(s)!");
	header("Location: book_Appointment.php");
} else{
// save data into a file

	$fileObject = [
		'fullname' =>$fullname,
		'email' =>$email,
		'date' =>$date,
        'time' =>$time,
        'nature' => $nature,
        'initial_complaint' => $initial_complaint,
		'catgry' =>$catgry,
		
	];
	//saving the data into the database(folder) and redirecting back to login page.

$department = ["graphics_design_appointments", "web_dev_appointments", "mobile_dev_appointments", "hardware/electronics_appointments"];
	if($catgry == "Graphics Design"){

		// give each appointment file a number and save the name  with the number
		$file = scandir("db/$department[0]/");
		$counter = count($file);
		$i= ($counter-1);
	file_put_contents("db/$department[0]/".$i.".json", json_encode($fileObject ));
	}
	if($catgry  == "Web Development"){
   
			// give each appointment file a number and save the name with the number
			$file = scandir("db/$department[1]/");
			$counter = count($file);
			$i= ($counter-1);
		file_put_contents("db/$department[1]/".$i.".json", json_encode($fileObject ));
		}
		if($catgry  == "Mobile Development"){
   
			// give each appointment file a number and save the name with the number
			$file = scandir("db/$department[2]/");
			$counter = count($file);
			$i= ($counter-1);
		file_put_contents("db/$department[2]/".$i.".json", json_encode($fileObject ));
		}
			if($catgry == "Hardware/Electronic Engineer"){
   
					// give each appointment file a number and save the name with the number
			$file = scandir("db/$department[3]/");
			$counter = count($file);
			$i= ($counter-1);

				file_put_contents("db/$department[3]/".$i.".json", json_encode($fileObject ));
				}
	set_alert("message", "Your appointment has been sent you will recieve a confirmation email soon");
	header("Location: login.php");
}




?>






