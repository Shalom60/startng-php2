<?php session_start();
require_once("functions/alert.php");
require_once("functions/user.php");

// collecting, verifying and validating data
$errorCount = 0;
if(!is_user_loggedin()){
  $token = $_POST['token'];
  $_SESSION['token'] = $token;
}

$email = $_POST['email'] != ""? $_POST['email'] : $errorCount++ ;
$pswrd = $_POST['pswrd'] != ""? $_POST['pswrd'] : $errorCount++ ;

$_SESSION['email'] = $email;

if($errorCount > 0){
  set_alert("error", "You have ". $errorCount . " blank space(s)!") ;
	 header("Location: reset.php");
} else{
    // check if email is registered in tokens folder

    $allUsers_Tokens = scandir("db/tokens/");
  $allusers_tokenCount = count($allUsers_Tokens);

  for($counter=0; $counter< count($allUsers_Tokens); $counter++){
    $current_tokenfile = $allUsers_Tokens[$counter];
    if($current_tokenfile == $email. ".json"){
        //check if token from the database is the same as $token

      $tokenString= file_get_contents("db/tokens/".$current_tokenfile);
       $tokenObject = json_decode($tokenString);
       $tokenFromDb = $tokenObject->token;

       if($_SESSION['logged_in']){
         $checkToken = true;
       } else{
        $checkToken = $tokenFromDb == $token;
       }
       if($checkToken) {
        $allUsers = scandir("db/users/");
        $usersCount = count($allUsers);
        
          
        //check for email
           
        for($counter=0; $counter< count($allUsers); $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser == $email. ".json"){
              // Password check
      
            $userString= file_get_contents("db/users/".$currentUser);
             $userObject = json_decode($userString);
           $userObject->pswrd =  password_hash($pswrd, PASSWORD_DEFAULT);

          //  //delete old password with user data
           unlink("db/users/". $currentUser);

           	//saving the data with new password into the database
	file_put_contents("db/users/".$email.".json", json_encode($userObject ));
  set_alert("message", "Password Reset successful, you can now login!");

  //send email to inform user of the pasword reset and redirect to login

  $subject = "Password Reset Successful";
	$message = "The password on your Devclub account has just been changed,if you did not initiate the change, please   visit:  http://localhost/startng_php2/login.php and reset your password immediately!". 
	$headers = "From: no-reply@snh.org" . "\r\n".
	"CC: shalomjsph@snh.org";

	$mail = mail($email,$subject,$message,$headers);
  header("Location: login.php");
  die();

            }
          }

       }


}
  }
  set_alert("error","Password Reset failed, token/email invalid or expired"); 
  header('Location: login.php');
  }

