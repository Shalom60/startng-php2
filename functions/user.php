<?php 

function is_user_loggedin(){
    
    if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])){
        return true;
    }
    return false;
    }
function is_token_set(){
    return is_token_set_in_get() || is_token_set_in_session();
}
function is_token_set_in_session(){
    return isset($_SESSION['token']);
}
function is_token_set_in_get(){
    return isset($_GET['token']);
}
function findUser($email= ""){
    //check if user exist in database

    $allUsers = scandir("db/users/");

       for($counter=0; $counter< count($allUsers); $counter++){
        $currentUser = $allUsers[$counter];
        if($currentUser == $email. ".json"){
        $userString= file_get_contents("db/users/".$currentUser);
        $userObject = json_decode($userString);
        
        return $userObject;
    }
}
return false;
}
function appointment_fee(){
    $email =  $_SESSION['email'];
    $all_transactions = scandir("db/transactions/");

    for($counter=1; $counter< count($all_transactions)-1; $counter++){
      $string= file_get_contents("db/transactions/".$counter.".json");
       $transaction = json_decode($string);

     if($email ==$transaction[0]->email){?>
    <ul>
    <li> <?php  echo $transaction[0]->time. ":"?> Paid appointment fee. </li>
    </ul> <?php
     }
     } 

}
function payment($email){
    $status = "";
    $all_transactions = scandir("db/transactions/");

    for($counter=1; $counter< count($all_transactions)-1; $counter++){
      $string= file_get_contents("db/transactions/".$counter.".json");
       $transaction_Object = json_decode($string);
    
     if($transaction_Object->paid ==$email){?>
    <td style="width:10%"><?php  echo "paid"; ?> <?php break;
     } else{ ?>
        <td style="width:10%"><?php  echo "not paid"; ?> <?php break;
     }
     } return true;
}

function saveUser($userObject){

file_put_contents("db/users/".$userObject['email'].".json", json_encode($userObject ));
}
?>
 <?php   function table_head(){?>
                <table border="1px solid black" style="width:100%; border-collapse:collapse"> 
                <tr>
                <th style="width:3%"> s/n</th>
                <th style="width:15%"> Name</th>
                <th style="width:12%"> Email address</th>
                <th style="width:15%"> Date of appointment</th>
                <th style="width:8%"> Time</th>
                <th style="width:15%"> Nature of appointment</th>
                <th style="width:22%"> Initial complaint </th>
                <th style="width:10%"> Payment </th>
               
                </tr>  </table>
             <?php 
              }
             
    ?>
     <?php   function table_users(){?>
                <table border="1" style="width:100%; border-collapse:collapse"> 
                <tr>
                <th style="width:25px"> s/n</th>
                <th style="width:200px"> Name</th>
                <th style="width:200px"> Email address</th>
                <th style="width:200px"> Gender</th>
                <th style="width:200px"> Department</th>
                 </tr>  </table>
             <?php 
              }
             
    ?>