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
function saveUser($userObject){

file_put_contents("db/users/".$userObject['email'].".json", json_encode($userObject ));
}
?>
 <?php   function table_head(){?>
                <table border="1px solid black"  style="width:100%"> 
                <tr>
                <th style="width:25px"> s/n</th>
                <th style="width:200px"> Name</th>
                <th style="width:200px"> Email address</th>
                <th style="width:200px"> Date of appointment</th>
                <th style="width:200px"> Time</th>
                <th style="width:200px"> Nature of appointment</th>
                <th style="width:200px"> Initial complaint </th>
                </tr>  </table>
             <?php 
              }
             
    ?>