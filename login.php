<?php  ?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="style/form.css">
      <title>XTrack | Login</title>
      <style media="screen">
      </style>
  </head>
  <body>
      <div class="full-height">

          <div class="container-fluid content-wrap">
              <div class="row">
                  <div class="col-md-5 left">
                      <a href="index.html"><div class="logo"></div><span>Track</span></a>
                      <div class="activity-img">
                      </div>
                      <div class="filler-shape"></div>
                  </div>
                  <div class="col-md">
                       <div class="login-option">
                           <label for="register">Don't have an account?</label> <a href="register.html"><button  id="register">Register</button></a>
                      </div>
                      <form action="" name="" onsubmit="event.preventDefault()">
                          <h4>Login and effortlessly manage your finances in one place</h4>
                          <input type="email" name="email" id="email" placeholder="Email Address" autofocus>
                          <input type="password" name="password" id="password" placeholder="Password">
                          <p class="error-msg"></p>
                          <img class="back-btn" src="images/back.png" width="20px"><input type="button" value="Go Back" name="back" onclick="goBack();">
                          <input type="submit" value="Login" name="login">
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript">
          function goBack() {
              window.history.back();
          }
      </script>
  </body>
</html>
