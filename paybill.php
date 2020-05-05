<?php
include_once("lib/header.php");
require_once("functions/alert.php");
?>
<?php print_alert();
?>
        <form action="process_pay.php" method="POST"> <p> - Pay appointment fee <button type="submit" name="button"> #1,000 </button> </p>
          </form> 

      <?php 
      
      $_SESSION['email'];
    


