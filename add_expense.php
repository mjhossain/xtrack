<?php 

require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();

if(!isset($_SESSION['loggedIn'])) {
    header('Location: login.php');
} else {
    if(!isset($_POST['addExpense'])){
        header('Location: dashboard.php');
    } else {
        $user_id = $_SESSION['user_id'];
        $expAmount = safeInput($_POST['expAmount']);
        $expDesc = safeInput($_POST['expDesc']);
    
        $user_total_amount = getAmount($conn, $user_id);
    
        
        $now = date('Y-m-d H:i:s');
    
       
        $query = "INSERT INTO transctions(user_id, description, amount, date) VALUES ($user_id, '$expDesc', $expAmount, '$now')";
    
        if(mysqli_query($conn, $query)) {
            $user_total_amount = $user_total_amount + $expAmount;
            $user_query = "UPDATE users SET totalExpense = $user_total_amount WHERE id = $user_id";
            if(mysqli_query($conn, $user_query)) {
                $_SESSION['expense_message'] = "transction added!";
                header('Location: dashboard.php');
            }  else {
                $_SESSION['expense_message'] = "transction falied!";
                header('Location: dashboard.php');
            }
        } else {
            $_SESSION['expense_message'] = "transction falied!";
            header('Location: dashboard.php');
        }
    }
}



?>