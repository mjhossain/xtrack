<?php 
require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();

date_default_timezone_set('America/New_York');

if(!isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
} else {

    $user_id = $_SESSION['user_id'];
    $user = getUserInfo($conn, $user_id);
    
    $user_del = array();
    
    $user_del = removeUser($conn, $user_id);

    //var_dump($user_del);

    if($user_del["user"] && $user_del["transctions"]) {
        session_destroy();
        header('Location: index.php');
    } else {
        //echo "User: " . $user_del["user"] ." Transctions: " . $user_del["transctions"];
        header('Location: account.php');
    }

}

?>