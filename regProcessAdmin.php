<?php session_start();

// collecting the data verifying data, validation
$errorCount = 0;

$firstname = $_POST['firstname'] != ""? $_POST['firstname'] : $errorCount++ ;
$lastname = $_POST['lastname'] != ""? $_POST['lastname'] : $errorCount++ ;
$email = $_POST['email'] != ""? $_POST['email'] : $errorCount++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $errorCount++ ;
$role= $_POST['role'] != ""? $_POST['role'] : $errorCount++ ;


//name and email validation

if (!preg_match("/^[a-zA-Z]/", $firstname)){
	$_SESSION['firstnameErr'] = "invalid first name, use letters only!";
	header("Location: adminRegister.php");
	die();
}
if (!preg_match("/^[a-zA-Z]/", $lastname)){
	$_SESSION['lasttnameErr'] = "invalid last name, use letters only!";
	header("Location:  adminRegister.php");
	die();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$_SESSION['emailErr'] = "invalid email address!";
	header("Location:  adminRegister.php");
	die();
}

if($errorCount > 0){
$_SESSION["error"] = "You have ". $errorCount . " blank space(s)!";
	header("Location:  adminRegister.php");
} else{ 	
	//Id auto increment
	$allAdmins = scandir("db/admins/");
  $adminCount = count($allAdmins);
  $adminId = ($adminCount-1);
 
  //adding time of registration
date_default_timezone_set('Africa/Nigeria');
$reg_date = date('d-m-y, g:i a' );

	$userObject = [
		'id' =>$adminId,
		'firstname' =>$firstname,
		'lastname' =>$lastname,
		'email' =>$email,
		'pswrd' => password_hash($pswrd, PASSWORD_DEFAULT),
		'role' =>$role,
		'reg_date' => $reg_date,
		'login_time' => $login_time,
	];
	$_SESSION["reg_date"] = $reg_date;
	//check if user already exist

	for($counter=0; $counter< count($allAdmins); $counter++){
          $Admin = $allAdmins[$counter+2];
          if($Admin == $role. ".json" ) {
              $userString= file_get_contents("db/admins/".$Admin);
          $AdminObj= json_decode($userString);
          }
          if($AdminObj->email == $email){
            $_SESSION['error2'] = "Registration failed, email already registered!";
            header('Location: adminRegister.php');
            die();
        }
		  if($Admin == $role. ".json"){
			  $_SESSION['error3'] = "Registration failed, admin already registered!";
			  header('Location: adminRegister.php');
			  die();
		  }
	}

	//saving the data into the database(folder) and redirecting to login page.
	file_put_contents("db/admins/".$role.".json", json_encode($userObject ));
	$_SESSION["message"] = "Registration successful, you can now login!";
	header("Location: adminLogin.php");
	
}





?>