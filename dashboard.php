
<?php 
require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();






if(!isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
} else {

    $activity_message = "";

    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
    $user_total_amount = getAmount($conn, $user_id);

}







if(isset($_POST['addExpense'])) {
    $expAmount = safeInput($_POST['expAmount']);
    $expDesc = safeInput($_POST['expDesc']);

    $user_total_amount = getAmount($conn, $user_id);

    $query = "INSERT INTO transctions(user_id, description, amount) VALUES ($user_id, '$expDesc', $expAmount)";

    if(mysqli_query($conn, $query)) {
        $user_total_amount = $user_total_amount + $expAmount;
        $user_query = "UPDATE users SET totalExpense = $user_total_amount WHERE id = $user_id";
        if(mysqli_query($conn, $user_query)) {
            $activity_message = "transction added!";
        }  else {
            $activity_message = "transction falied!";
        }
    } else {
        $activity_message = "transction falied!";
    }
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
            <a href="#">
                <div class="user-image-wrap">
                    <div class="user-image"></div>
                </div>
            </a>
            <nav>
                <a href="dashboard.php" title="Dashboard"><button class="nav-item active" ><img src="images/dashboard-img/home.png" width="40%"></button></a>
                <a href="#" title="Account"><button class="nav-item"><img src="images/dashboard-img/user.png" width="40%"></button></a>
                <a href="#" title="Support"><button class="nav-item"><img src="images/dashboard-img/headset.png" width="40%"></button></a>
<!--                <a href="#"><button class="nav-item"><img src="images/dashboard-img/gear.png" width="40%"></button></a>-->
            </nav>
            <a href="logout.php"><button class="logout"><img src="images/dashboard-img/logout.png"  width="40%"></button></a>
        </div>
        <div class="main-content">
            <div class="margin-fix">
                <div class="row topBar">
                    <h1>Hello <?php echo $user_name; ?></h1>
                </div>
                <div class="mt-2 row">
                    <div class="col-lg-5 box">
                        <div class="box1 shadow">
                            <h6 class="h6-heading">Expense Chart</h6>
                            <!-- <canvas id="myChart"></canvas> -->
                        </div>
                    </div>
                    <div class="col-lg-3 box">
                        <div class="box2 shadow">
                            <h6 class="h6-heading mb-0">Total Transaction</h6>
                            <table class="table table-borderless center-table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Today</th>
                                        <td><p id="weekly-total" class="total-summary mb-0">$340.29</p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Weekly</th>
                                        <td><p id="weekly-total" class="total-summary mb-0">$340.29</p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Monthly</th>
                                        <td><p id="monthly-total" class="total-summary mb-0">$989.97</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 box">
                        <div class="box3 shadow">
                            <h6 class="h6-heading mt-1">Card information</h6>
                            <div class="card-wrap">
                                <div class="credit-card"></div>
                                <div class="card-details mt-4">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Card Holder</th>
                                                <td><?php echo $user_name; ?></td>
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
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <input name="expAmount" type="text" placeholder="Enter expense amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autofocus required>
                        <input name="expDesc" type="text" placeholder="Enter description" onkeypress="return /[A-Za-z\s]/i.test(event.key)" required>
                        <input type="submit" value="Add new expense" class="shadow addExpense-btn" name="addExpense">
                        <button onclick="event.preventDefault();" class="close-btn">Close</button>
                    </form>
                </div>
                
                <div class="row mt-5 justify-content-around">
                    <!-- Table -->
                    <div class="col-lg-8">
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
                                
                                $q = "SELECT * FROM transctions WHERE user_id = $user_id";
                                $result = mysqli_query($conn, $q);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                       echo  "<tr>".
                                            "<th scope=\"row\">".$row['date']."</th>".
                                            "<td class=\"description\">".$row['description']."</td>".
                                            "<td>$ ".$row['amount']."</td>".
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
                        <button class="see-all mt-1 mb-4 btn btn-secondary btn-lg btn-block shadow">View all transaction</button>
                        

                    </div>
                    <!-- Table Above -->

                    <div class="col-lg-4 accDetailsBox">
                        <button class="addExpense shadow"><i class="fas fa-1x fa-plus mr-4"></i> Add Expense</button>
                        <div class="mt-4 accDetails shadow">
                            <h2 class="mb-5 text-center">Total Expense</h2>
                            <h1 class="text-center"><?php echo "$".$user_total_amount; ?></h1> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="js/charts.js"></script> -->
    <script>
        $('.addExpense').click(function(){
            $('.bg-overlay, .expense-form').css("display","block")
        })
        $('.close-btn').click(function(){
            $('.bg-overlay, .expense-form').css("display","none")
        })
    </script>
</body>

</html>