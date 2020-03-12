
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
          <a href=""><div class="logo"></div><span>Track</span></a>
          <nav>
              <a href="">About</a>
              <a href="">Support</a>
          </nav>
          <button id="login">Login</button>
          <button id="sign-up">Sign Up</button>
      </header>

      <section>

          <!--Lading Page Text and Images-->
          <div class="center-content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md px-0 left">
                          <div class="inside-center">
                              <span>Control</span>
                              <h1>Take control over your money</h1>
                              <p>
                                  It is your money and you should know how and when you are spending it. <br><br>
                                  With XTrack you can manage your expenses seamlessly &amp; intuitively.
                              </p>
                              <button class="get-started">Get Started</button>
                          </div>
                      </div>
                      <!-- Bootstrap Carousel-->
                      <div class="col-md px-0 right">
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

          <!-- Sign Up Form Page-->
          <div class="form-wrap">
              <button class="close-btn"><img src="images/back.png" width="20px">Back To Home</button>
              <div class="logo"></div>
                  <form action="" name="sign-up">
                      <h1>Sign Up</h1>
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-sm-12 px-0">
                                  <input type="text" placeholder="First Name" name="fname">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="text" placeholder="Last Name" name="lname">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="email" placeholder="Email Address" name="email">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="password" placeholder="Password" name="password">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="password" placeholder="Re-Enter Password" name="re-password">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="submit" value="Create Account" name="create-account" class="submit">
                              </div>
                          </div>
                      </div>
                  </form>
              </div>

          <!-- Login Form Page-->
          <div class="form-wrap-2">
              <button class="close-btn"><img src="images/back.png" width="20px">Back To Home</button>
              <div class="logo"></div>
                  <form action="" name="login">
                      <h1>Sign In</h1>
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-sm-12 px-0">
                                  <input type="email" placeholder="Email Address" name="email">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="password" placeholder="Password" name="password">
                              </div>
                              <div class="col-sm-12 px-0">
                                  <input type="submit" value="Sign In" name="login-btn" class="submit">
                              </div>
                          </div>
                      </div>
                  </form>
              </div>

      </section>

      <footer>Designed and Developed By <a href="#">Anup</a> &amp; <a href="#">Mohammed</a>.</footer>

      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

      <!--Toggle Form Page-->
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
  </body>
</html>

