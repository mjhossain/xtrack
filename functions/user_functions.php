<?php
// require('database.php');
date_default_timezone_set('America/New_York');
session_start();


function getUserInfo($conn, $user_id) {
    $user = array();
    $user_sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $user_sql);
    if(mysqli_query($conn, $user_sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            $user['name'] = $row['fullName'];
            $user['email'] = $row['email'];
            $user['phone'] = $row['phone'];
            $getDate = strtotime($row['regDate']);
            $user['date'] = date('m/d/y', $getDate);;
            $user['amount'] = $row['totalExpense'];
        }
    } else {
        $_SESSION['user_message'] = "Server Error!";
    }

    return $user;
}

function removeUser($conn, $user_id) {
    $user_del = array("user" => false, "transctions" => false);
    $user_del_sql = "DELETE FROM users WHERE id = $user_id";
    $user_transctions_del = "SELECT * FROM transctions WHERE user_id = $user_id";
    $transctions_result = mysqli_query($conn, $user_transctions_del);
    $user_transctions = mysqli_num_rows($transctions_result);
   
    

    //echo $user_transctions;
    if($user_transctions > 0) {
        $delete_count = 0;
        while($row = mysqli_fetch_assoc($transctions_result)) {
            $id = $row['id'];
            if(mysqli_query($conn, "DELETE FROM transctions WHERE id = $id")){
                $delete_count++;
            } else {
                echo mysqli_error($conn);
            }
            
        }

        if($delete_count == $user_transctions){
            $user_del["transctions"] = true;
        }
    } else {
        $user_del["transctions"] = true;
    }

    if(mysqli_query($conn, $user_del_sql)) {
        $user_del["user"] = true;
    } else {
        echo mysqli_error($conn);
    }
    //echo $delete_count;
    return $user_del;
}

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



function getMontlyExpense($conn, $user_id) {
    $monthlyQuery = "SELECT * FROM transctions WHERE user_id = $user_id";
    $monthlyResult = mysqli_query($conn, $monthlyQuery);
    $monthlyTotal = 0.00;
    $month = date("n");
    
    if(mysqli_query($conn, $monthlyQuery)) {
        while($row = mysqli_fetch_assoc($monthlyResult)) {
            $dbDate = strtotime($row['date']);
            $formattedDate = date("n", $dbDate);
            if($formattedDate == $month) {
                $monthlyTotal += $row['amount']; 
            }
        }
    } else {
        echo mysqli_error($conn);
    }
    return $monthlyTotal;
}







?>