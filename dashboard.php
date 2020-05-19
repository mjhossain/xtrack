<?php 
require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();

date_default_timezone_set('America/New_York');




if(!isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
} else {
    $activity_message = $_SESSION['expense_message'];

    $user_id = $_SESSION['user_id'];

    // Method declared in functions/user_functions.php
    $user = getUserInfo($conn, $user_id);

    date_default_timezone_set('America/New_York');
    $today = date('m/d', time());

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>XTrack | Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/dash.css">
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
                <a href="dashboard.php" title="Dashboard"><button class="nav-item active" ><img src="images/dashboard-img/home.png" width="40%"></button></a>
                <a href="transactions.php" title="All Transactions"><button class="nav-item"><img src="images/dashboard-img/list.png" width="40%"></button></a>
                <a href="account.php" title="Account"><button class="nav-item"><img src="images/dashboard-img/user.png" width="40%"></button></a>
<!--                <a href="#"><button class="nav-item"><img src="images/dashboard-img/gear.png" width="40%"></button></a>-->
            </nav>
            <a href="logout.php"><button class="logout"><img src="images/dashboard-img/logout.png"  width="40%"></button></a>
        </div>
        <div class="main-content">
            <div class="margin-fix">
                <div class="row topBar">
                    <h1 class="first-name"></h1>
                </div>
                <div class="mt-2 row">
                    
                    <div class="col-lg-4 box">
                        <div class="mb-4 accDetails shadow">
                            <div class="total-expense">
                                <h5 class="mb-3 text-center">Total Expense</h5>
                                <h1 class="text-center expense-amount"><?php echo "$".$user['amount']; ?></h1> 
                            </div>
                            <button class="addExpense shadow"><i class="fas fa-1x fa-plus mr-4"></i> Add Expense</button>
                        </div>
                    </div>

                    <div class="col-lg-3 box">
                        <div class="box2 shadow">
                            <h6 class="h6-heading mb-0">Total Transaction</h6>
                            <table class="table table-borderless center-table">
                                <tbody>
                                    <tr>
                                    <?php 
                                       // Method is defined in /functions/user_functions.php Line 18
                                       $todayTotal = getTodaysExpense($conn, $user_id);
                                    ?>
                                        <th scope="row">Today</th>
                                        <td><p id="weekly-total" class="total-summary mb-0">$<?php echo $todayTotal; ?></p></td>
                                    </tr>
                                    <tr>
                                    <?php 
                                       // Method is defined in /functions/user_functions.php Line 36
                                       $weeklyTotal = getWeeklyExpense($conn, $user_id);
                                    ?>    
                                        <th scope="row">Weekly</th>
                                        <td><p id="weekly-total" class="total-summary mb-0">$<?php echo $weeklyTotal; ?></p></td>
                                    </tr>
                                    <tr>
                                    <?php 
                                        // Method is defined in /functions/user_functions.php Line 57
                                        $monthlyTotal = getMontlyExpense($conn, $user_id);
                                    ?> 
                                        <th scope="row">Monthly</th>
                                        <td><p id="monthly-total" class="total-summary mb-0">$<?php echo $monthlyTotal; ?></p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-5 box">
                        <div class="box3 shadow">
                            <h6 class="h6-heading mt-1">Card information</h6>
                            <div class="card-wrap">
                                <div class="credit-card"></div>
                                <div class="card-details">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Card Holder</th>
                                                <td><?php echo $user['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Card</th>
                                                <td>Debit</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Card Type</th>
                                                <td>Master Card</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Card Ending</th>
                                                <td>**** 4637</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Expiry Date</th>
                                                <td>10/06/2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CVV</th>
                                                <td>564</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>Active</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-overlay"></div>
                <div class="expense-form shadow">
                    <form method="post" action="add_expense.php">
                        <input name="expAmount" type="text" placeholder="Enter expense amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autofocus required>
                        <input name="expDesc" type="text" placeholder="Enter description" onkeypress="return /[A-Za-z\s]/i.test(event.key)" required>
                        <input type="submit" value="Add new expense" class="shadow addExpense-btn" name="addExpense">
                        <button onclick="event.preventDefault();" class="close-btn">Close</button>
                    </form>
                </div>
                
                <div class="row mt-5 justify-content-around">
                    <!-- Table -->
                    <div class="col-lg-12">
                        <h3 class="topBar  mb-4">Recent Activity</h3>
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
                                
                                $q = "SELECT * FROM transctions WHERE user_id = $user_id ORDER BY date DESC LIMIT 5";
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
                        <small class="text-muted"><?php echo $activity_message; ?></small>
                        <a href="transactions.php"><button class="see-all mt-1 mb-4 btn btn-secondary btn-lg btn-block shadow">View all transaction</button></a>
                        

                    </div>
                    <!-- Table Above -->
<!--

                    <div class="col-lg-4 accDetailsBox">
                        <button class="addExpense shadow"><i class="fas fa-1x fa-plus mr-4"></i> Add Expense</button>
                        <div class="mt-4 mb-4 accDetails shadow">
                            <div class="total-expense">
                                <h2 class="mb-3 text-center">Total Expense</h2>
                                <h1 class="text-center expense-amount"><?php echo "$".$user['amount']; ?></h1> 
                            </div>
                        </div>
                    </div>
                </div>
-->

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!--Get first name and display-->
    <script>
         var name = "<?php echo $user['name'];?>".split(' ').slice(0, -1).join(' ');
         $('.first-name').html(`Hello ${name}`)
    </script>
    <!-- <script src="js/charts.js"></script> -->
    <script>
        $('.addExpense').click(function(){
            $('.bg-overlay, .expense-form').css("display","block")
        })
        $('.close-btn').click(function(){
            $('.bg-overlay, .expense-form').css("display","none")
        })
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
           var ctx = document.getElementById('myChart').getContext('2d');
           
           var myChart = new Chart(ctx, {
               type: 'bar',
               data: {
                   labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                   datasets: [{
                       label: 'Expense',
                       data: [120.11, 85.83, 30.41, 55.86, 212.43, 30.12, 111.21],
                       backgroundColor: [
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)',
                           'RGBA(52, 238, 160, .2)'
                       ],
                       borderColor: [
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)',
                           'RGBA(52, 238, 160, .7)'
                       ],
                       borderWidth: 1
                   }]
               },
               options: {
                   title: {
                       display: true,
                       text: 'Daily Expense'
                   },
                   responsive: true,
                   scales: {
                       yAxes: [{
                           ticks: {
                               beginAtZero: true,
                               // Include a dollar sign in the ticks
                               callback: function(value, index, values) {
                                   return '$' + value;
                               }
                           }
                       }],
                   }
               }
           });
    </script>
</body>

</html>