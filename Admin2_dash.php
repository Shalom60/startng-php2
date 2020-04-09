<?php session_start();
?>

   <h1>  <?php echo $_SESSION['role']; ?> </h1> <br>
   Welcome, <?php echo $_SESSION['fullName']; ?> 
  <p> Date Of Reg: <?php echo $_SESSION['reg_date']; ?> </p> 
  <p> Last Login Time:  <?php echo $_SESSION['login_time']; ?> </p> <br>
