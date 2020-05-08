<?php
require('database.php');

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


?>