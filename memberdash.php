<?php
include_once("lib/header.php");
require_once("functions/user.php");
?>
<h1> Dashboard </h1>

<b>Welcome, <?php echo $_SESSION['fullName']  ?>. <br> You are logged in as a <?php echo $_SESSION['role'] ?>. </b><br>
 <strong>User Id: </strong> <?php echo $_SESSION['logged_in']?> <br>
 <strong> Department: </strong> <?php echo $_SESSION['catgry'] ?> <br>
 <strong> Date Of Reg: </strong> <?php echo $_SESSION["reg_date"] ?> <br>
 <strong>Last Login Time: </strong> <?php echo $_SESSION["login_time"] ?>

 <h3> What will you like to do? </h3>
 <ol>
     <li> <a href="paybill.php" style="color: black; border-bottom: transparent">  Pay Bill </a> </li>
     <li> <a href="book_Appointment.php" style="color: black; border-bottom: transparent"> Book Appointment </a> </li>
</ol> <br>
 
<h3> Transaction History </h3>

<?php $email =  $_SESSION['email'];

      //     $all_transactions = scandir("db/transactions/");

      //     for($counter=1; $counter< count($all_transactions)-1; $counter++){
      //   	$string= file_get_contents("db/transactions/".$counter.".json");
			//  $transaction_Object = json_decode($string);
          
      //      if($transaction_Object->paid == $email){?>
      <!-- //     <ul> -->
      <!-- //     <li> Paid appointment fee </li> -->
      <!-- //     </ul> --> <?php 
      //      }
      //      } ?>
 <?php  $message = "Paid appointment fee ";
 appointment_fee();
?>

  <?php
include_once("lib/footer.php");
?>