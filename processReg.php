<?php session_start();
require_once("functions/alert.php");
require_once("functions/user.php");

// collecting, verifying and validating data
$errorCount = 0;

$firstname = $_POST['firstname'] != ""? $_POST['firstname'] : $errorCount++ ;
$lastname = $_POST['lastname'] != ""? $_POST['lastname'] : $errorCount++ ;
$email = $_POST['email'] != ""? $_POST['email'] : $errorCount++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $errorCount++ ;
$gender = $_POST['gender'] != ""? $_POST['gender'] : $errorCount++ ;
$role= $_POST['role'] != ""? $_POST['role'] : $errorCount++ ;
$catgry = $_POST['catgry']!= ""? $_POST['catgry'] : $errorCount++ ;


$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['role'] = $role;
$_SESSION['catgry'] = $catgry;

// data, name and email validation

if($errorCount > 0){
	set_alert("error", "You have ". $errorCount . " blank space(s)!");
	header("Location: reg.php");
} else{

	if (!preg_match("/^[a-zA-Z]/", $firstname)){
		set_alert("error", "invalid first name, use letters only!") ;
		header("Location: reg.php");
		die();
	}
	if (!preg_match("/^[a-zA-Z]/", $lastname)){
		set_alert("error", "invalid last name, use letters only!");
		header("Location: reg.php");
		die();
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		set_alert("error", "invalid email address!");
		header("Location: reg.php");
		die();
	}

	//Id auto increment
	$allUsers = scandir("db/users/");
  $usersCount = count($allUsers);
  $userId = ($usersCount-1);
 
  //adding time of registration
date_default_timezone_set('Africa/Lagos');
$reg_date = date('d-m-y, g:i a' );

	$userObject = [
		'id' =>$userId,
		'firstname' =>$firstname,
		'lastname' =>$lastname,
		'email' =>$email,
		'pswrd' => password_hash($pswrd, PASSWORD_DEFAULT),
		'gender' =>$gender,
		'role' =>$role,
		'catgry' =>$catgry,
		'reg_date' => $reg_date,
	];
	$_SESSION["reg_date"] = $reg_date;
	//check if user already exist

	$userExists = findUser($email);
	if($userExists){
			set_alert("error", "Registration failed, email already registered!");
			  header('Location: reg.php');
			  die();
		  }
	

	//saving the data into the database(folder) and redirecting to login page.
	saveUser($userObject);
	set_alert("message", "Registration successful, you can now login!");
	header("Location: login.php");
	
}





?>

