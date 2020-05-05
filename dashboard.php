<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/dash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

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
                <a href="#"><button class="nav-item" ><img src="images/dashboard-img/home.png" width="40%"></button></a>
                <a href="#"><button class="nav-item"><img src="images/dashboard-img/user.png" width="40%"></button></a>
                <a href="#"><button class="nav-item"><img src="images/dashboard-img/headset.png" width="40%"></button></a>
                <a href="#"><button class="nav-item"><img src="images/dashboard-img/gear.png" width="40%"></button></a>
            </nav>
            <button class="logout"><img src="images/dashboard-img/logout.png"  width="40%"></button>
        </div>
        <div class="main-content">
            <div class="margin-fix">
                <div class="row topBar">
                    <h1>Hello Candice</h1>

                </div>
                <div class="mt-2 row">
                    <div class="col-lg-6 box">
                        <div class="box1 shadow">
                            <h6>Expense Chart</h6>
                            <!-- <canvas id="myChart"></canvas> -->
                        </div>
                    </div>
                    <div class="col-lg-3 box">
                        <div class="box2 shadow">
                            <h6>Expense vs Last Month</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 box">
                        <div class="box3 shadow">
                            <div class="row">
                                <h6>Payment Methods</h6>
                            </div>
                            <div class="row paymentMethodHolder justify-content-around align-items-around">
                                <div class="row">
                                    <button class="btn-lg paymentMethod">

                                    </button>
                                    <button class="ml-2 btn-lg paymentMethod">

                                    </button>
                                </div>
                                <div class="row mt-2">
                                    <button class="btn-lg paymentMethod">

                                    </button>
                                    <button class="ml-2 btn-lg paymentMethod">

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 justify-content-around">
                    <!-- Table -->
                    <div class="col-lg-8">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Amount($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">02/17 12:45pm</th>
                                    <td>AMEX *0099</td>
                                    <td>$ 75.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/18 03:08pm</th>
                                    <td>Discover *2233</td>
                                    <td>$ 400.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 10:00am</th>
                                    <td>Chase *4000</td>
                                    <td>$ 17.56</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 11:00am</th>
                                    <td>TD *7861</td>
                                    <td>$ 80.50</td>
                                </tr>
                                <tr>
                                    <th scope="row">02/19 2:00pm</th>
                                    <td>Chase *4000</td>
                                    <td>$ 10.99</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- Table Above -->

                    <div class="col-lg-4 accDetailsBox">
                        <button class="addExpense shadow"><i class="fas fa-1x fa-plus mr-4"></i> Add Expense</button>
                        <div class="mt-4 accDetails shadow">
                            <h6>Income/Expense</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="js/charts.js"></script> -->
</body>

</html>