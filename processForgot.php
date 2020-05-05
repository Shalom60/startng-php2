<?php session_start();
require_once("functions/alert.php");
require_once("functions/user.php");

// collecting the data verifying data, validation
$errorCount = 0;
$email = $_POST['email'] != ""? $_POST['email'] : $errorCount++ ;



//  email validation

if($errorCount > 0){
	set_alert("error", "You have ". $errorCount . " blank space(s)!");
    header("Location: forgot.php");
    die();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	set_alert("error", "invalid email address!");
	header("Location: forgot.php");
	die();
}


 else{
    // check if email is registered
    
	$userExists = findUser($email);
	if($userExists){
			  //send email and redirect to reset password page

			  //Generate token randomly

			  $token = "";

			  $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

			  for($i=0; $i<20; $i++){
				  $index = mt_rand(0,count($alphabets)-1);
				  $token .= $alphabets[$index];

			  }

    $subject = "Password reset link";
	$message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore, otherwise visit: localhost/startng_php2/reset.php?token=". 
	$token;
	$headers = "From: no-reply@snh.org" . "\r\n".
	"CC: shalomjsph@snh.org";

		//save token to database
		file_put_contents("db/tokens/".$email.".json", json_encode(['token'=>$token] ));
		
	$mail = mail($email,$subject,$message,$headers);
	
	if($mail){
		set_alert("message", "Password reset has been sent to your email"); 
		header('Location: login.php');
		
	} else{
		set_alert("error", "Something went wrong we could not send reset password!");
header('Location: forgot.php');
	}
        die();   
	}
}
   

set_alert("error", "Email address not registered!");
header('Location: forgot.php');
die();




?>

