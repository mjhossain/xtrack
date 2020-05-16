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
    $user = getUserInfo($conn, $user_id);
    
    
    if(isset($_POST['save'])) {
        $fullname = safeInput($_POST['full-name']);
        $email = safeInput($_POST['email']);
        $phone = safeInput($_POST['phone']);
        
       
        
        $update_sql = "UPDATE users SET fullName = '$fullname', email = '$email', phone = '$phone' WHERE id = $user_id";
        
        if (mysqli_query($conn, $update_sql)) {
            echo "Saved!";
            mysqli_close($conn);
            header("location: dashboard.php");
        }else{
            echo "Error:". " <br>". mysqli_error($conn);
        }
    } else {
        
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
                            
                            <div class="account-detail-wrap">
                                <div class="initials"></div>
                                <h2 class="mt-4"><?php echo $user_name; ?></h2>
                                <p class="member-since mt-3">Member since <?php echo $user['date']; ?></p>
                                <form class="update-info" id="update-info" action="account.php" method="post" onsubmit="event.preventDefault();">
                                    <table class="table table-borderless mt-4 mb-4">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <td><input type="text" id="full-name" value='<?php echo $user['name']; ?>' class="fullName"  name="full-name" disabled></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone #</th>
                                                <td><input type="text" id="phone" value="<?php echo $user['phone']; ?>"  name="phone" disabled maxlength="14"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email Address</th>
                                                <td><input type="email" id="email" size="25" value="<?php echo $user['email']; ?>"  name="email" disabled></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="save" value="Save Changes" class="save-btn btn btn-secondary shadow mt-4" onclick="validateInput();">
                                    <button class="cancel-btn mt-4" onclick="window.location.reload();">Cancel</button>
                                </form>
                                
                                <div class="delete-row">
                                        <button class="delete-btn mt-4">Delete Account</button>
                                        <p class="confirm-msg mt-3 mb-0">
                                            Are you sure you want to delete your account?
                                        </p>
                                        <a class="confirm-link" href="delete_user.php">Yes</a><a class="confirm-link no" href="#">No</a>
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
    <!--Script for making phone input format work-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!--Script for making phone input format work-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <!--Script for phone format on input-->
    <script>
        var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-##############"}];
        $('#phone').inputmask({
            mask: phones,
            greedy: false,
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
        });
    </script>
    <!-- Script for validating input fields and submitting the form-->
    <script>
        function validateInput(){
            var fullname = $('#full-name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            
            var errors = [];
            
            if (!fullname.match(/^[A-Za-z\s]+$/)) {
                $("#full-name").css("border","1px solid red");
                errors.push("fullname error");
            }
            $('#full-name').on("focus", function() {
                $("#full-name").css("border","none");
                remove_array_element(errors, "fullname error");
            });
            
            if (phone === "") {
                $("#phone").css("border","1px solid red");
                errors.push("phone error");
            }
            $('#phone').on("focus", function() {
                $("#phone").css("border","none");
                remove_array_element(errors, "phone error");
            });
            
            if (!email.match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/)) {
                $("#email").css("border","1px solid red");
                errors.push("email error");
            }
            $('#email').on("focus", function() {
                $("#email").css("border","none");
                remove_array_element(errors, "email error");
            });
            
            if (errors.length == 0) {
                document.getElementById("update-info").removeAttribute("onsubmit");
                // alert('validation successful!')
            }
        }
    </script>
    <!--Script for showing and hiding modal-->
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
            $('.cancel-btn').css("display","block")
        })
        /*
        $('.save-btn').click(function(){
            $('input').attr("disabled","true")
            $('.save-btn').css("display","none")
            $('.delete-btn').css("display","none")
            $('.edit-btn').css("display","block")
            $('.update-info').submit()
            // $('.update-info').removeAttr("onsubmit")
        })
        */
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
    <!-- Script for getting initials from full name and displaying-->
    <script>
        var name = "<?php echo $user['name'];?>"
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
        $('.initials').html(getInitials(name))
    </script>
</body>

</html>