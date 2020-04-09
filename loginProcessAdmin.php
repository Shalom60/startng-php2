<?php session_start();
	  
	  $error1 = 0;

$email = $_POST['email'] != ""? $_POST['email'] : $error1++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $error1++ ;



if($error1 > 0){
	$_SESSION["error3"] = "please provide a password and email address";
	header("Location: adminLogin.php");
} 
else{
	$allAdmins = scandir("db/admins/");
  $adminCount = count($allAdmin);
  
		
	//check if email is registered
     
	for($counter=0; $counter< count($allAdmins); $counter++){
          $currentAdmin = $allAdmins[$counter];
          
			$userString= file_get_contents("db/admins/".$currentAdmin);
            $userObject = json_decode($userString);
		  if($userObject->email == $email){
			  // Password check

			$pswrdFromDb = $userObject->pswrd;
			$pswrdFromUser = $pswrd;
			   $$pswrdFromUser = password_verify($pswrd, $pswrdFromDb);
			if($pswrdFromUser = $pswrdFromDb) {
				//set time and redirect to dashboard  
			
				$login_time = date('d-m-y, g:i a');
				$_SESSION['logged_in'] = $userObject->id;
				$_SESSION['fullName'] = $userObject->firstname. " " .$userObject->lastname;
				$_SESSION['role'] = $userObject->role;
				$_SESSION['reg_date'] = $userObject->reg_date;
				$_SESSION["login_time"] = $login_time;
				if($userObject->role == "Super Admin"){
				header('Location: superAdmin_dash.php');
				die();
				} else if($userObject->role == "Admin 1"){
                    header('Location: Admin1_dash.php');
                    die();
                    }
                    else if($userObject->role == "Admin 2"){
                        header('Location: Admin2_dash.php');
                        die();
                        }
                        else if($userObject->role == "Admin 3"){
                            header('Location: Admin3_dash.php');
                            die();
                            }
			}
		  
		  }
	}
    $_SESSION['error4'] = "Invalid email or password";
header('Location: adminLogin.php');
}
?>