<?php session_start();
require_once("functions/user.php");
?>

   <h1>  <?php echo $_SESSION['role']; ?> </h1> <br>
   Welcome, <?php echo $_SESSION['fullName']; ?> 
  <p> Date Of Reg: <?php echo $_SESSION['reg_date']; ?> </p> 
  <p> Last Login Time:  <?php echo $_SESSION['login_time']; ?> </p> <br>


<button type="button"> <a href= "adminRegister.php"> Add User </a> </button> <br>
 

 <?php echo "<br>";

// get all the users from users database
$allUsers = scandir("db/users/");
$counter = count($allUsers);
$i=0;
 //list out the details of all the members
echo  "<span style ='font-size:25px;'>".  "&nbsp &nbspList of all Members". "</span>";
             table_users();
 for($counter=2; $counter< count($allUsers); $counter++){
   
   $userString= file_get_contents("db/users/".$allUsers[$counter]);
  $userObject = json_decode($userString);
 if($userObject->role == "Member"){
 
  $i+=1;
  ?>
                <table    border="1" style="width:100%">   
                 <tr> 
              <td style="width:25px"><?php echo $i;?>
               <td style="width:200px"><?php  print $userObject->firstname." " .$userObject->lastname; ?>
             <td style="width:200px"><?php  print $userObject->email; ?>
            <td style="width:200px"><?php  print $userObject->gender; ?>
             <td style="width:200px"><?php  print $userObject->catgry; ?>
           </tr>
                   </table>   
                    <?php 
 }

 }

 $i=0; echo "<br>";
 //list out the details of all the members
echo "<span style ='font-size:25px;'>". "&nbsp &nbspList of all Developers". "</span>";
table_users();
for($counter=2; $counter< count($allUsers); $counter++){
$userString= file_get_contents("db/users/".$allUsers[$counter]);
$userObject = json_decode($userString);
if($userObject->role == "Developer"){
  $i+=1;
?>
   <table    border="1" style="width:100%">   
    <tr> 
 <td style="width:25px"><?php echo $i;?>
  <td style="width:200px"><?php  print $userObject->firstname." ".$userObject->lastname; ?>
<td style="width:200px"><?php  print $userObject->email; ?>
<td style="width:200px"><?php  print $userObject->gender; ?>
<td style="width:200px"><?php  print $userObject->catgry; ?>
</tr>
      </table>    
       <?php 
}


} ?>

<h3>Transactions</h3>
<?php
  
   
?>
 