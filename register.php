<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="style/form.css">

      <title>XTrack | Register</title>
      <style media="screen">
      </style>
  </head>
  <body>
      <div class="full-height">

          <div class="container-fluid content-wrap">
              <div class="row">
                  <div class="col-md-5 left left-for-register">
                      <a href="index.php"><div class="logo logo-white"></div><span class="white">Track</span></a>
                      <div class="activity-img2">
                      </div>
                      <div class="white-filler-shape"></div>
                      <div class="filler-shape2"></div>
                      <div class="requirements-wrap">
                          <ul>
                              <li class="upp-case"><img class="check" src="images/check.png" width="20px"> Must have at least 1 uppercase letter</li>
                              <li class="low-case"><img class="check" src="images/check.png" width="20px"> Must have at least 1 lowercase letter</li>
                              <li class="num-char"><img class="check" src="images/check.png" width="20px"> Must have at least 1 numeric character</li>
                              <li class="char-long"><img class="check" src="images/check.png" width="20px"> Must be at least 8 characters long</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md">
                      <div class="login-option">
                          <label for="login">Already have an account?</label> <a href="login.php"><button id="login">Login</button></a>
                      </div>
                      <form action="" name="" id="sign-up-form" onsubmit="event.preventDefault()">
                          <h4>Life is good when you’re on top of your money</h4>

                          <input class="err-border" type="text" name="fullname" id="fullname" placeholder="Full Name" autofocus>
                          <p class="error-msg nameErr"></p>

                          <input type="text" name="phone" id="phone" placeholder="Phone #" maxlength="14">
                          <p class="error-msg phoneErr"></p>

                          <input type="email" name="email" id="email" placeholder="Email Address">
                          <p class="error-msg emailErr"></p>

                          <input type="password" name="password" id="password" placeholder="Password" oninput="checkPassword()">
                          <p class="error-msg passwordErr"></p>

                          <input type="password" name="password" id="con-password" placeholder="Confirm Password">
                          <p class="error-msg conPasswordErr"></p>

                          <img class="back-btn" src="images/back.png" width="20px"><input type="button" value="Go Back" name="back" onclick="goBack();">
                          <input type="submit" value="Create Account" name="register" class="create-acc" onclick="validateForm('register');">
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="script/validation.js"></script>

      <!--Script for making phone input format work-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!--Script for making phone input format work-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>


      <!--Script for going back to the previous page-->
      <script>
          function goBack() {
              window.history.back();
          }
      </script>

      <!--Script for phone format on input-->
      <script>
          $(window).load(function()
                         {
              var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-##############"}];
              $('#phone').inputmask({
                  mask: phones,
                  greedy: false,
                  definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
          });
      </script>

      <!--Script for showing and hiding password requirements-->
      <script>
          $('#password').focus(function(){
              $('.requirements-wrap').addClass('show')
          })
          $('#fullname, #phone, #email, #con-password').click(function(){
              $('.requirements-wrap').removeClass('show')
          })
      </script>

      <!--Script for realtime update on password requirements list upon user input-->
      <script>
          function checkPassword() {
              var password = $('#password').val();
              var confirm_password = $('#con-password').val();

              var number = /[0-9]/;
              var low_case = /[a-z]/;
              var upp_case = /[A-Z]/;

              if(password.match(upp_case)){
                  $('.upp-case').addClass("isvalid");
              }else{
                  $('.upp-case').removeClass("isvalid");
              }

              if(password.match(low_case)){
                  $('.low-case').addClass("isvalid");
              }else{
                  $('.low-case').removeClass("isvalid");
              }

              if(password.match(number)){
                  $('.num-char').addClass("isvalid");
              }else{
                  $('.num-char').removeClass("isvalid");
              }

              if(password.length >= 8){
                  $('.char-long').addClass("isvalid");
              }else{
                  $('.char-long').removeClass("isvalid");
              }
          }
      </script>

  </body>
</html>
