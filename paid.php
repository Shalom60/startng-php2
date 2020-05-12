<?Php session_start(); require_once("functions/alert.php");



              //send email to the customer 
              
      $email= $_SESSION['email'];
       
       
$subject = "Appointment Fee Payment";
$message = "Your payment of #1,000 as just been recieved, if you did not make this payment,  visit: localhost/startng_php2/index.php  and contact us to rectify it." ; 

$headers = "From: no-reply@snh.org" . "\r\n".
"CC: shalomjsph@snh.org";

$mail = mail($email,$subject,$message,$headers);

// time of transaction
date_default_timezone_set("Africa/Lagos");
$time = date('d-m-y, g:ia ');

// save record of transaction

$transaction = [
      'email' => $email,
      'time' => $time,
];
$all_transactions = scandir("db/transactions/");
 $id = count($all_transactions)-1;
 file_put_contents("db/transactions/".$id.".json", json_encode($transaction ));

 
 //set alert and redirect to paybill 
 set_alert("message", "Your payment was successful");
header('Location: paybill.php');
	 die();
      ?>
       
       
