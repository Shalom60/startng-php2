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