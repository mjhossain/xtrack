
<?php 

session_start();

isset($_SESSION['loggedIn']) ? header('Location: dashboard.php') : null;

?>

<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->

      <link rel="stylesheet" href="style/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="stylesheet" href="style/landing.css">

      <title>XTrack | Getting Started</title>
  </head>
  <body>
      <header>
          <a href="index.php"><div class="logo"></div><span>Track</span></a>
          <nav>
              <!-- <a href="">About</a>
              <a href="">Team</a> -->
<!--              <a href="">Support</a>-->
          </nav>
          <a href="login.php"><button id="login">Login</button></a>
          <a href="register.php"><button id="sign-up">Sign Up</button></a>
      </header>

      <section>

          <!--Lading Page Text and Images-->
          <div class="center-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md order-md-1 order-2 px-0 left">
                          <div class="inside-center">
                              <span>Control</span>
                              <h1>Take control over your money</h1>
                              <p>
                                  It is your money and you should know how and when you are spending it. <br><br>
                                  With XTrack you can manage your expenses seamlessly &amp; intuitively.
                              </p>
                              <a href="register.php"><button class="get-started">Get Started</button></a>
                          </div>
                      </div>
                      <!-- Bootstrap Carousel-->
                      <div class="col-md order-1  px-0 right">
                            <div class="carousel-wrap">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="images/checkout.gif" alt="Los Angeles" style="width:100%;">
                                        </div>
                                        <div class="item">
                                            <img src="images/receipt.gif" alt="Chicago" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="images/wallet.gif" alt="Chicago" style="width:100%;">
                                        </div>

                                    </div>
                                    <div class="carousel-wrap">

                                    </div>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>

      </section>

      <footer>Designed and Developed By <a href="#">Anup</a> &amp; <a href="#">Mohammed</a>.</footer>

      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

      <!--Toggle Form Page-->
<!--
      <script>
          $('#sign-up, .get-started').click(function(){
              $('.form-wrap').toggleClass('slide-in-right')
          })
          $('#login').click(function(){
              $('.form-wrap-2').toggleClass('slide-in-right')
          })
          $('.close-btn').click(function(){
              $('.form-wrap').removeClass('slide-in-right')
              $('.form-wrap-2').removeClass('slide-in-right')
          })
      </script>
-->
  </body>
</html>
