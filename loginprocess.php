<?php session_start();
	  
	  $error1 = 0;

$email = $_POST['email'] != ""? $_POST['email'] : $error1++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $error1++ ;

$_SESSION['email'] = $email;

if($error1 > 0){
	$_SESSION["error3"] = "please provide a password and email address";
	header("Location: login.php");
} 
else{
	$allUsers = scandir("db/users/");
  $usersCount = count($allUsers);
  
		
	//check if email is registered
     
	for($counter=0; $counter< count($allUsers); $counter++){
		  $newUser = $allUsers[$counter];
		  if($newUser == $email. ".json"){
			  // Password check

			$userString= file_get_contents("db/users/".$newUser);
			 $userObject = json_decode($userString);
			$pswrdFromDb = $userObject->pswrd;
			$pswrdFromUser = $pswrd;
			   $$pswrdFromUser = password_verify($pswrd, $pswrdFromDb);
			if($pswrdFromUser = $pswrdFromDb) {
				//set time and redirect to dashboard  
			
				$login_time = date('d-m-y, g:i a');
				$_SESSION['logged_in'] = $userObject->id;
				$_SESSION['fullName'] = $userObject->firstname. " " .$userObject->lastname;
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
    $_SESSION['error4'] = "Invalid email or password";
header('Location: login.php');
}
?>