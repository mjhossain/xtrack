<?php

require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();

date_default_timezone_set('America/New_York');

if(!isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
} else {
    
    // $activity_message = $_SESSION['expense_message'];

    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
    $user_total_amount = getAmount($conn, $user_id);

    date_default_timezone_set('America/New_York');
    $today = date('m/d', time());
    // echo $today;
    // echo $today;

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>XTrack | Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/dash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    </style>
</head>

<body>
    <div class="body-wrap">
        <div class="side-nav">
            <a href="dashboard.php">
                <div class="nav-logo-wrap">
                    <div class="nav-logo"></div>
                </div>
            </a>
            <nav>
                <a href="dashboard.php" title="Dashboard"><button class="nav-item" ><img src="images/dashboard-img/home.png" width="40%"></button></a>
                <a href="#" title="Account"><button class="nav-item"><img src="images/dashboard-img/user.png" width="40%"></button></a>
                <a href="#" title="Support"><button class="nav-item  active"><img src="images/dashboard-img/list.png" width="40%"></button></a>
<!--                <a href="#"><button class="nav-item"><img src="images/dashboard-img/gear.png" width="40%"></button></a>-->
            </nav>
            <a href="logout.php"><button class="logout"><img src="images/dashboard-img/logout.png"  width="40%"></button></a>
        </div>
        <div class="main-content">
            <div class="margin-fix">
                <div class="row topBar">
                    <h1>Hello <?php echo $user_name; ?></h1>
                </div>
                <div class="col-lg-12 mt-5">
                        <h3 class="topBar  mb-4 text-center">All Transctions</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount($)</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                
                                $q = "SELECT * FROM transctions WHERE user_id = $user_id";
                                $result = mysqli_query($conn, $q);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $time = strtotime($row['date']);
                                        $formatTime = date("m/d g:i A", $time);
                                       echo  "<tr>".
                                            "<th class=\"date\" scope=\"row\">".$formatTime."</th>".
                                            "<td class=\"description\">".$row['description']."</td>".
                                            "<td class=\"amount\">$ ".$row['amount']."</td>".
                                        "</tr>";
                                    }
                                } else {
                                    $activity_message = "No transctions available.";
                                    echo  "<tr>".
                                            "<th scope=\"row\">Date</th>".
                                            "<td class=\"description\">Expense Description</td>".
                                            "<td>$ 00.00</td>".
                                        "</tr>";
                                }
                                ?>

                                
                                
                            </tbody>
                        </table>
                        <!-- <small class="text-muted"><?php echo $activity_message; ?></small> -->
                        <!-- <button class="see-all mt-1 mb-4 btn btn-secondary btn-lg btn-block shadow">View all transaction</button> -->
                        

                    </div>
                    <!-- Table Above -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>        