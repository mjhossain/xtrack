<?php

session_start();

if(isset($_SESSION['loggedIn'])) {
    session_destroy();
    header('Location: index.php');
} else {
    echo 'Logout Unsuccessfull!';
}

?>