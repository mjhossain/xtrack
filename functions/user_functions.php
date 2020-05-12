<?php
require('database.php');
// date_default_timezone_set('America/New_York');

function getAmount($connection, $user_id) {
    $amount = 0.00;
    $expQuery = "SELECT * FROM users WHERE id=$user_id";
    if($res = mysqli_query($connection, $expQuery)) {
        while($row = mysqli_fetch_assoc($res)) {
            $amount = $row['totalExpense'];
        }
    } else {
    }
    return $amount;
}


function getTodaysExpense($conn, $user_id) {
    $query = "SELECT * FROM transctions WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $todayTotal = 0.00;
    if(mysqli_num_rows($result) > 0) {
        $nowDate = date('m/d');
        while($row = mysqli_fetch_assoc($result)){
            $rawDate = strtotime($row['date']);
            $today = date('m/d', $rawDate);
            
            if($nowDate == $today) {
                $todayTotal += $row['amount'];
            } 
        }
    } 
    return $todayTotal;
}


function getWeeklyExpense($conn, $user_id) {
    $query = "SELECT * FROM transctions WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $weeklyExpense = 0.00;

    $startWeek = date('m/d',strtotime("Monday This Week"));
    $endWeek = date('m/d',strtotime("Monday Next Week"));

    // echo $startWeek . $endWeek;

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $dbDate = strtotime($row['date']);
            $formattedDate = date("m/d", $dbDate);
            if(($formattedDate >= $startWeek) && ($formattedDate < $endWeek)) {
                $weeklyExpense += $row['amount']; 
            }
        }
    }
    return $weeklyExpense;
}








?>