<?php
include_once("lib/header.php");
require_once("functions/user.php");
?>
<h1> Dashboard </h1>

<b>Welcome, <?php echo $_SESSION['fullName']  ?>. <br> You are logged in as a <?php echo $_SESSION['role'] ?>. </b><br>
 <strong>User Id: </strong> <?php echo $_SESSION['logged_in']?> <br>
 <strong> Department: </strong> <?php echo $_SESSION['catgry'] ?> <br>
 <strong> Date Of Reg: </strong> <?php echo $_SESSION["reg_date"] ?> <br>
 <strong> Last Login Time: </strong> <?php echo $_SESSION["login_time"] ?> <br>

 <h2> Appointments </h2>

 
 <?php
 $catgry = $_SESSION['catgry'] ;

 // check for pending appointments
        $department = ["graphics_design_appointments", "web_dev_appointments", "mobile_dev_appointments", "hardware/electronics_appointments"];
        
        if($catgry == "Graphics Design"){
    
            //get all the listed appointments in Graphics design 
               table_head();
            $file = scandir("db/$department[0]/");
            $counter = count($file);
            if($counter>2){
            for($i=1; $i<$counter-1; $i++){
            $appointments_String= file_get_contents("db/$department[0]/".$i.".json");
            $fileObject = json_decode($appointments_String);
             
            ?>
                  <table    border="1" style="width:100%">   
              <tr> 
              <td style="width:25px"><?php echo $i;?>
              <td style="width:200px"><?php  print $fileObject->fullname; ?>
              <td style="width:200px"><?php  print $fileObject->email; ?>
              <td style="width:200px"><?php  print $fileObject->date; ?>
              <td style="width:200px"><?php  print $fileObject->time; ?>
              <td style="width:200px"><?php  print $fileObject->nature; ?>
              <td style="width:200px"><?php  print $fileObject->initial_complaint; ?>
              <?php 
                            payment( $fileObject->email); ?>
                                  </tr>
              </table>    
            <?php }
            }
            else { echo "<span style ='font-size:25px;'>". " You have no pending appointments.". "</span>";
                                                   
             } 
            }
                      
                  else  if($catgry == "Web Development"){    
              
                 //get all the listed appointments in web development
                 table_head();
                      
               $file = scandir("db/$department[1]/");
                $counter = count($file);
                if($counter>2){
                   for($i=1; $i<$counter-1; $i++){
                  $appointments_String= file_get_contents("db/$department[1]/".$i.".json");
                  $fileObject =json_decode($appointments_String);
                                  
                  ?>
                        <table    border="1" style="width:100%">   
                    <tr> 
                    <td style="width:25px"><?php echo $i;?>
                    <td style="width:200px"><?php  print $fileObject->fullname; ?>
                    <td style="width:200px"><?php  print $fileObject->email; ?>
                    <td style="width:200px"><?php  print $fileObject->date; ?>
                    <td style="width:200px"><?php  print $fileObject->time; ?>
                    <td style="width:200px"><?php  print $fileObject->nature; ?>
                    <td style="width:200px"><?php  print $fileObject->initial_complaint; ?>
                    <?php 
                            payment( $fileObject->email); ?>

                                </tr>  
                           </table>  
                           
                  <?php    
                }   
                  } 
                   else { echo "<span style ='font-size:25px;'>". " You have no pending appointments.". "</span>";
                                                   
                   } 
                          
                  } 
                  
                   else  if ($catgry == "Mobile Development"){       
          
                             //get all the listed appointments in mobile development
                          table_head();
                            $file = scandir("db/$department[2]/");
                            $counter = count($file);
                            if($counter>2){
                            for($i=1; $i<$counter-1; $i++){
                            $appointments_String= file_get_contents("db/$department[2]/".$i.".json");
                            $fileObject = json_decode($appointments_String);
                          
                          ?>
                                  <table    border="1" style="width:100%">   
                              <tr> 
                              <td style="width:25px"><?php echo $i;?>
                              <td style="width:200px"><?php  print $fileObject->fullname; ?>
                              <td style="width:200px"><?php  print $fileObject->email; ?>
                              <td style="width:200px"><?php  print $fileObject->date; ?>
                              <td style="width:200px"><?php  print $fileObject->time; ?>
                              <td style="width:200px"><?php  print $fileObject->nature; ?>
                              <td style="width:200px"><?php  print $fileObject->initial_complaint; ?>
                              <?php 
                            payment( $fileObject->email); ?>
                                                  </tr>
                              </table>    
                            <?php }
                            }
                             else { echo "<span style ='font-size:25px;'>". " You have no pending appointments.". "</span>";
                                                   
                             } 
                             }
                               
                                                                  
                                  
                               else  if($catgry == "Hardware/Electronic Engineer"){  
          
                                 //get all the listed appointments in hardware/electronic 
                                 table_head();
                      
               $file = scandir("db/$department[3]/");
                $counter = count($file);
                if($counter>2){
                   for($i=1; $i<$counter-1; $i++){
                  $appointments_String= file_get_contents("db/$department[3]/".$i.".json");
                  $fileObject =json_decode($appointments_String);
                                    
                  ?>
                        <table    border="1" style="width:100%">   
                    <tr> 
                    <td style="width:25px"><?php echo $i;?>
                    <td style="width:200px"><?php  print $fileObject->fullname; ?>
                    <td style="width:200px"><?php  print $fileObject->email; ?>
                    <td style="width:200px"><?php  print $fileObject->date; ?>
                    <td style="width:200px"><?php  print $fileObject->time; ?>
                    <td style="width:200px"><?php  print $fileObject->nature; ?>
                    <td style="width:200px"><?php  print $fileObject->initial_complaint; ?>
                    <?php 
                            payment( $fileObject->email); ?>
                                        </tr>
                    </table>    
                  <?php }
                  }
                   else { echo "<span style ='font-size:25px;'>". " You have no pending appointments.". "</span>";
                                                   
                   } 
                  } ?>
      
        
 <?php      

include_once("lib/footer.php");

?>
  