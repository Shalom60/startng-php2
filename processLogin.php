<?php session_start();
require_once("functions/alert.php");
require_once("functions/user.php");
	  
	  $error1 = 0;

$email = $_POST['email'] != ""? $_POST['email'] : $error1++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $error1++ ;

$_SESSION['email'] = $email;
$_SESSION['logged_in'] = "log";
if($error1 > 0){
	set_alert("error", "please provide a password and email address");
	header("Location: login.php");
} 
else{
	$allUsers = scandir("db/users/");
  $usersCount = count($allUsers);
  
		
	//check if email is registered
     
	for($counter=0; $counter< count($allUsers); $counter++){
		  $currentUser = $allUsers[$counter];
		  if($currentUser == $email. ".json"){
			  // Password check   

			$userString= file_get_contents("db/users/".$currentUser);
			 $userObject = json_decode($userString);
			$pswrdFromDb = $userObject->pswrd;
			$pswrdFromUser = $pswrd;
			   $pswrdFromUser = password_verify($pswrd, $pswrdFromDb);
			if($pswrdFromUser == $pswrdFromDb) {
				//set time and redirect to dashboard  
			
				$login_time = date('d-m-y, g:i a');
               	$_SESSION['logged_in'] = $userObject->id;
				$_SESSION['fullName'] = $userObject->firstname. " " .$userObject->lastname;
				$_SESSION['email'] = $userObject->email;
				$_SESSION['role'] = $userObject->role;
				$_SESSION['catgry'] = $userObject->catgry;
				$_SESSION['reg_date'] = $userObject->reg_date;
				$_SESSION["login_time"] = $login_time;
				if($userObject->role == "Member"){
				header('Location: memberDash.php');
				die();
				} 
					header('Location: developerDash.php');
				die();
			}
		  
		  }
	}
	set_alert("error", "Invalid email or password");
header('Location: login.php');
}
?>