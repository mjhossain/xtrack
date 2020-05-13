<?php 
require('functions/database.php');
require('functions/functions.php');
require('functions/user_functions.php');
session_start();

date_default_timezone_set('America/New_York');

if(!isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
} else {

    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
    $user_phone = $_SESSION['phone'];
    $reg_date = $_SESSION['reg_date'];
    
    if(isset($_POST['save'])) {
//            $message = "Working!";
        $fullname = test_input($_POST['full-name']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        
        
        $update_sql = "UPDATE users SET fullName = '$fullname', email = '$email', phone = '$phone' WHERE id = $user_id";
        
        if (mysqli_query($conn,$update_sql)) {
            echo "Saved!";
            mysqli_close($conn);
            header("location: dashboard.php");
        }else{
            echo "Error:". " <br>". mysqli_error($conn);
        }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>XTrack | Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/dash.css">
    <link rel="stylesheet" href="./style/account.css">
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
                <a href="transactions.php" title="All Transactions"><button class="nav-item"><img src="images/dashboard-img/list.png" width="40%"></button></a>
                <a href="account.php" title="Account"><button class="nav-item active"><img src="images/dashboard-img/user.png" width="40%"></button></a>
<!--                <a href="#"><button class="nav-item"><img src="images/dashboard-img/gear.png" width="40%"></button></a>-->
            </nav>
            <a href="logout.php"><button class="logout"><img src="images/dashboard-img/logout.png"  width="40%"></button></a>
        </div>
        <div class="main-content">
            <div class="margin-fix">
                <div class="container-fluid center mb-5">
                    <div class="row">
                        <div class="col-12">
                            
<!--                            <h1><?php echo $message;?></h1>-->
                            
                            <div class="account-detail-wrap">
                                <div class="initials"></div>
                                <h2 class="mt-4"><?php echo $user_name; ?></h2>
                                <p class="member-since mt-3">Member since <?php echo $reg_date; ?></p>
                                <form class="update-info" action="account.php" method="post">
                                    <table class="table table-borderless mt-4 mb-4">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <td><input type="text" value='<?php echo $user_name; ?>' class="fullName" disabled name="full-name"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone #</th>
                                                <td><input type="text" value="<?php echo $user_phone; ?>" disabled name="phone"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email Address</th>
                                                <td><input type="email" value="<?php echo $user_email; ?>" disabled name="email"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="save" value="Save Changes" class="save-btn btn btn-secondary shadow mt-4">
                                </form>
                                
                                <div class="delete-row">
                                        <button class="delete-btn mt-4">Delete Account</button>
                                        <p class="confirm-msg mt-3 mb-0">
                                            Are you sure you want to delete your account?
                                        </p>
                                        <a class="confirm-link" href="#">Yes</a><a class="confirm-link no" href="#">No</a>
                                    </div>
                                <button class="edit-btn btn btn-secondary btn shadow mt-4">Edit Info</button>
                            </div>
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
        $('.edit-btn').click(function(){
            $('input').removeAttr("disabled")
            $('.fullName').focus()
            $('.save-btn').css("display","block")
            $('.delete-btn').css("display","block")
            $('.edit-btn').css("display","none")
//            $('.update-info').attr("onsubmit","event.preventDefault()")
        })
        $('.save-btn').click(function(){
            $('input').attr("disabled","true")
            $('.save-btn').css("display","none")
            $('.delete-btn').css("display","none")
            $('.edit-btn').css("display","block")
//            $('.update-info').removeAttr("onsubmit")
        })
        $('.delete-btn').click(function(){
            $('.confirm-msg').css("display","block")
            $('.confirm-link').css("display","inline-block")
            $('.save-btn').attr("disabled","true")
        })
        $('a.no').click(function(){
            $('.confirm-msg').css("display","none")
            $('.confirm-link').css("display","none")
            $('.save-btn').removeAttr("disabled")
        })
    </script>
    <script>
        var name = "<?php echo $user_name;?>"
        var getInitials = function (name) {
            var parts = name.split(' ')
            var initials = ''
            for (var i = 0; i < parts.length; i++) {
                if (parts[i].length > 0 && parts[i] !== '') {
                    initials += parts[i][0]
                }
            }
            return initials
        }
//        var initials = getIni
        $('.initials').html(getInitials(name))
    </script>
</body>

</html>