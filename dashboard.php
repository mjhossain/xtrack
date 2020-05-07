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
                    <h1>Hello Candice</h1>
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
                                                <td>Candice Cohan</td>
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
                    <form>
                        <input type="text" placeholder="Enter deposit amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autofocus required>
                        <input type="text" placeholder="Enter description" onkeypress="return /[A-Za-z\s]/i.test(event.key)" required>
                        <input type="submit" value="Add new expense" class="shadow addExpense-btn" >
                        <button onclick="event.preventDefault();" class="close-btn">Close</button>
                    </form>
                </div>
                
                <div class="row mt-5 justify-content-around">
                    <!-- Table -->
                    <div class="col-lg-8">
                        <h3 class="topBar mb-4">Recent Activity</h3>
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">02/17 12:45pm</th>
                                    <td class="description">AMAZON purchase</td>
                                    <td>$ 75.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/18 03:08pm</th>
                                    <td class="description">GEICO car insurance</td>
                                    <td>$ 400.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 10:00am</th>
                                    <td class="description">UBER car ride</td>
                                    <td>$ 17.56</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 11:00am</th>
                                    <td class="description">Trader Joe's Groceries</td>
                                    <td>$ 80.50</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 2:00pm</th>
                                    <td class="description">UBER Eats</td>
                                    <td>$ 10.99</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="see-all mt-1 mb-4 btn btn-secondary btn-lg btn-block shadow">View all transaction</button>

                    </div>
                    <!-- Table Above -->

                    <div class="col-lg-4 accDetailsBox">
                        <button class="addExpense shadow"><i class="fas fa-1x fa-plus mr-4"></i> Add Expense</button>
                        <div class="mt-4 accDetails shadow">
                            <h6 class="h6-heading">Income/Expense</h6>
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